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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                {!! $form->renderFormElement('article_category_title') !!}
                                {!! $form->renderFormElement('article_category_lead') !!}
                                {!! $form->renderFormElement('article_category_text') !!}
                                {!! $form->renderFormElement('status') !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>



@endsection
