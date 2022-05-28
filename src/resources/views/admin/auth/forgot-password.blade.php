@extends('admin._layout.auth')

@section('content')
    <div class="login-logo">
        <a href="{{route('admin.auth.login')}}"><b>Livewire</b>CMS</a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Forgot password?</p>
            <form action="{{route('admin.auth.login')}}" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="@lang('admin.label.email')">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
{{--                <div class="input-group mb-3">--}}
{{--                    <input type="password" class="form-control" placeholder="@lang('admin.label.password')">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <div class="input-group-text">--}}
{{--                            <span class="fas fa-lock"></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary btn-block">@lang('admin.label.reset-password')</button>
                    </div>
                </div>
            </form>

{{--            <p class="mb-1">--}}
{{--                <a href="{{route('admin.auth.forgot-password')}}">@lang('admin.label.forgot-password')</a>--}}
{{--            </p>--}}

        </div>

    </div>
@endsection
