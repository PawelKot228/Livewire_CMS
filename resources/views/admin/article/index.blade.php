@extends('admin._layout.default')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">@lang('admin.nav.article')</h1>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{route('admin.article.edit')}}">
                            @lang('admin.label.new')
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    {{ $dataTable->scripts() }}
@endpush
