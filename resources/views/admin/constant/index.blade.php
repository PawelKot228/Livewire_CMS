@extends('admin._layout.default')

@section('content')
    <form method="POST">
        @csrf
        @include('admin._layout._admin-header', ['title' => 'Constant', 'save' => true])
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Basic info</h2>
                        </div>
                        <div class="card-body">
                            {!! $form->renderFormElement('company_name') !!}
                            {!! $form->renderFormElement('company_address') !!}
                            {!! $form->renderFormElement('company_description') !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
