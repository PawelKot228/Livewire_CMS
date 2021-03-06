<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="{{asset('admin/css/vendors/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/vendors/bootstrap4-toggle.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

{{--    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">--}}
{{--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css"/>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/admin.css')}}">

    <script>
        const csrf_token = "{{csrf_token()}}";
    </script>
    @php
        $user = Auth::guard('admin')->user();
    @endphp

    @livewireStyles
    @stack('css')
</head>
<body class="{{$user->hasDarkMode() ? 'dark-mode' : ''}} ">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand">
        <!-- Left navbar links -->
    {{--        <ul class="navbar-nav">--}}
    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>--}}
    {{--            </li>--}}
    {{--            <li class="nav-item d-none d-sm-inline-block">--}}
    {{--                <a href="index3.html" class="nav-link">Home</a>--}}
    {{--            </li>--}}
    {{--            <li class="nav-item d-none d-sm-inline-block">--}}
    {{--                <a href="#" class="nav-link">Contact</a>--}}
    {{--            </li>--}}
    {{--        </ul>--}}

    <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto d-flex align-items-center">
            <li class="nav-item mr-3">
                <div class="dark-mode-switch">
                    <input type="checkbox" data-toggle="toggle" data-size="sm" id="dark-mode-switch"
                           data-on="<i class='fa-solid fa-moon fa-fw'></i>"
                           data-off="<i class='fa-solid fa-sun fa-fw'></i>"
                           data-onstyle="dark" data-offstyle="light"
                           data-style="border" {{$user->hasDarkMode() ? 'checked' : ''}}>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.auth.log-out')}}" class="btn btn-danger" title="Log out"><i
                        class="fa-solid fa-arrow-right-from-bracket fa-fw"></i></a>
            </li>

        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{route('admin.index')}}" class="brand-link">
            {{--            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
            {{--                 style="opacity: .8">--}}
            <span class="brand-text font-weight-light">{{config('app.name')}}</span>
        </a>

        <livewire:admin.admin-navigation/>

    </aside>

    <div class="content-wrapper">
        <div class="content">
            @yield('content')
        </div>
    </div>

    <footer class="main-footer">
        &nbsp;
        <div class="float-right d-none d-sm-inline">
            <small>Currently using Laravel v{{App::VERSION()}}</small>
        </div>
    </footer>
    @include('admin._layout._messages')
</div>


@stack('modal')

<script src="{{asset('admin/js/vendors/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('admin/js/vendors/adminlte.min.js')}}"></script>
{{--<script src="http://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>--}}
<script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('admin/js/vendors/bootstrap4-toggle.min.js')}}"></script>
<script src="{{asset('admin/js/main.js')}}"></script>

@livewireScripts
@stack('js')


<script>
    $('#dark-mode-switch').change(function () {
        $.post({
            url: "{{route('admin.api.dark-mode')}}",
            data: {
                '_token': csrf_token,
                'dark_mode': Number(this.checked),
            },
        }).done(data => {
            if (data.status === 'OK') {
                $('body').toggleClass('dark-mode');
                console.log('toggle class')
            }
        })
    })

</script>
</body>
</html>
