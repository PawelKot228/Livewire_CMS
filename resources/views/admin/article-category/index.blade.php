@extends('admin._layout.default')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            @include('admin._layout._admin-header', [
                    'title' => __('admin.nav.article-category'),
                    'new' => route('admin.article-category.edit'),
                ])
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
