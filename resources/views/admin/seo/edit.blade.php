@extends('admin._layout.default')

@section('content')
    <form method="POST">
        @csrf
        <div class="content-header">
            <div class="container-fluid">
                @include('admin._layout._admin-header', [
                    'title' => __('admin.nav.seo'),
                    'save' => true,
                    'save_exit' => true,
                    'exit' => route('admin.seo.index'),
                ])


                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-header">{{__('admin.label.basic-info')}}</div>
                            <div class="card-body">
                                {!! $form->renderFormElement('slug') !!}
                                <hr>
                                {!! $form->renderFormElement('seo_title') !!}
                                {!! $form->renderFormElement('seo_description') !!}
                                {!! $form->renderFormElement('seo_keywords') !!}
                            </div>

                        </div>
                    </div>
{{--                    <div class="col-md-6 col-xl-4">--}}
{{--                        <livewire:admin.seo :model="$obj" />--}}
{{--                    </div>--}}
                </div>

            </div>
        </div>
    </form>



@endsection
