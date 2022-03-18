@extends('admin._layout.auth')

@section('content')
    <div class="login-logo">
        <a href="{{route('admin.auth.login')}}"><b>Livewire</b>CMS</a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{{route('admin.auth.login')}}" method="post">
                @csrf

                {!! $form->renderFormElement('login') !!}
                {!! $form->renderFormElement('password') !!}

                <div class="row mt-2">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">@lang('admin.label.remember-me')</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">@lang('admin.label.sign-in')</button>
                    </div>

                </div>
            </form>

            <p class="mb-1">
                <a href="{{route('admin.auth.forgot-password')}}">@lang('admin.label.forgot-password')</a>
            </p>

        </div>

    </div>
@endsection
