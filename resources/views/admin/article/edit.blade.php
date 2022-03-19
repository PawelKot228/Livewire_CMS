@extends('admin._layout.default')

@section('content')
    <form method="POST">
        @csrf
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">@lang('admin.nav.article')</h1>
                    <div class="card-tools">
                        <button type="submit" class="btn btn-primary">@lang('admin.label.save')</button>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            {!! $form->renderFormElement('article_title') !!}
                            {!! $form->renderFormElement('article_lead') !!}
                            {!! $form->renderFormElement('article_text') !!}
                            {!! $form->renderFormElement('status') !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </form>



@endsection
