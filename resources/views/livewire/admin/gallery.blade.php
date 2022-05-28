<div class="card fuchsia">
    <div class="card-header">
        <b>Gallery</b>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            {!! $form->renderFormElement('filename') !!}

                        </div>
                        <div class="col-12 col-md-6">
                            {!! $form->renderFormElement('cover') !!}
                        </div>
                        <div class="col-12 col-md-6">
                            {!! $form->renderFormElement('status') !!}
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-sm btn-primary" wire:click="save">
                                {{__('admin.label.submit')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Thumb</th>
            <th>filename</th>
            <th>size</th>
            <th>cover</th>
            <th>status</th>
            <th>added by</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            {{--                @dd(Storage::disk('upload')->url($item->filename))--}}
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <img src="{{Storage::disk('upload')->url($item->filename)}}" alt="" class="img-thumbnail"
                         style="max-width: 100px">
                </td>
                <td><small>{{$item->getFilename()}}</small></td>
                <td>{{formatSizeUnits(Storage::disk('upload')->size($item->filename))}}</td>
                <td>
                    <input type="checkbox" {{$item->cover ? 'checked' : ''}}
                           wire:click="changeStatus({{$item->getKey()}}, 'cover', {{$item->cover ? 0 : 1}})">
                </td>
                <td>
                    <input type="checkbox" {{$item->status ? 'checked' : ''}}
                           wire:click="changeStatus({{$item->getKey()}}, 'status',  {{$item->status ? 0 : 1}})">
                </td>
                <td>{{$item->user?->getFullname()}}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger"
                            title="delete"
                            wire:click="delete({{$item->getKey()}})">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
