@extends('admin._layout.default')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <form method="POST">
                @csrf
                @include('admin._layout._admin-header', ['title' => __('admin.nav.constant'), 'save' => true])


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Basic info</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! $form->renderFormElement('company_name') !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! $form->renderFormElement('company_address') !!}
                                    </div>
                                    <div class="col-12">
                                        {!! $form->renderFormElement('company_description') !!}
                                    </div>
                                    <div class="col-12">
                                        {!! $form->renderFormElement('company_text') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
