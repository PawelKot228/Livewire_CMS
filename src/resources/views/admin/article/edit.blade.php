@extends('admin._layout.default')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <form method="POST">
                @csrf
                @include('admin._layout._admin-header', [
                    'title' => __('admin.nav.article'),
                    'save' => true,
                    'save_exit' => true,
                    'exit' => route('admin.article.index'),
                ])


                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-header">{{__('admin.label.basic-info')}}</div>
                            <div class="card-body">
                                {!! $form->renderFormElement('id_article_category') !!}
                                <hr>
                                {!! $form->renderFormElement('article_title') !!}
                                {!! $form->renderFormElement('article_lead') !!}
                                {!! $form->renderFormElement('status') !!}

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <livewire:admin.seo-controller :model="$obj"/>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {!! $form->renderFormElement('article_text') !!}
                            </div>
                        </div>
                    </div>
                </div>

            </form>


            @if($obj->getKey())
                <livewire:admin.gallery-item-controller :model="$obj"/>
            @endif
        </div>
    </div>

@endsection
