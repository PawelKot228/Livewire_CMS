@extends('admin._layout.default')

@section('content')
    <form method="POST">
        @csrf
        <div class="content-header">
            <div class="container-fluid">
                @include('admin._layout._admin-header', [
                    'title' => __('admin.nav.article'),
                    'save' => true,
                    'save_exit' => true,
                    'exit' => route('admin.article.index'),
                ])


                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                {!! $form->renderFormElement('id_article_category') !!}
                                <hr>
                                {!! $form->renderFormElement('article_title') !!}
                                {!! $form->renderFormElement('article_lead') !!}
                                {!! $form->renderFormElement('article_text') !!}
                                {!! $form->renderFormElement('status') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <livewire:admin.seo :model="$obj" />
                    </div>
                </div>

            </div>
        </div>
    </form>



@endsection
