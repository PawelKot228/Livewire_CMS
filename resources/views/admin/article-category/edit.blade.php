@extends('admin._layout.default')

@section('content')
    <form method="POST">
        @csrf
        <div class="content-header">
            <div class="container-fluid">
                @include('admin._layout._admin-header', [
                                    'title' => __('admin.nav.article-category'),
                                    'save' => true,
                                    'save_exit' => true,
                                    'exit' => route('admin.article-category.index'),
                                ])


                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-header">{{__('admin.label.basic-info')}}</div>
                            <div class="card-body">
                                {!! $form->renderFormElement('article_category_title') !!}
                                {!! $form->renderFormElement('article_category_lead') !!}
                                {!! $form->renderFormElement('article_category_text') !!}
                                {!! $form->renderFormElement('status') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <livewire:admin.seo-controller :model="$obj" />
                    </div>
                </div>

            </div>
        </div>
    </form>


    @if($obj->getKey())
        <livewire:admin.gallery-item-controller :model="$obj" />
    @endif

@endsection
