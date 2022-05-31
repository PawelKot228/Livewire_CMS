@extends('admin._layout.default')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <form method="POST">
                @csrf
                @include('admin._layout._admin-header', ['title' => __('admin.nav.constant'), 'save' => true])


                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Basic info</h2>
                            </div>
                            <div class="card-body">
                                {!! $form->renderFormElement('company_name') !!}
                                {!! $form->renderFormElement('company_phone') !!}
                                {!! $form->renderFormElement('company_email') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Socials</h2>
                            </div>
                            <div class="card-body">
                                {!! $form->renderFormElement('company_twitter') !!}
                                {!! $form->renderFormElement('company_facebook') !!}
                                {!! $form->renderFormElement('company_linkedin') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Additional text</h2>
                            </div>
                            <div class="card-body">
                                {!! $form->renderFormElement('company_address') !!}
                                {!! $form->renderFormElement('company_description') !!}
                                {!! $form->renderFormElement('company_text') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
