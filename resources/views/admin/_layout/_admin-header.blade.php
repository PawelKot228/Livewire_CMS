<div class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{$title ?? ''}}</h1>
                @if(isset($save))
                    <div class="card-tools">
                        <button class="btn btn-primary">@lang('admin.label.save')</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
