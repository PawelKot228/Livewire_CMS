<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Livewire CMS</title>

    <link rel="stylesheet" href="{{asset('admin/css/vendors/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/vendors/bootstrap4-toggle.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .dark-mode-switch .toggle-on, .dark-mode-switch .toggle-off {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5em;
        }
    </style>
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


            {{--            <li class="nav-item dropdown">--}}
            {{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
            {{--                    <i class="far fa-comments"></i>--}}
            {{--                    <span class="badge badge-danger navbar-badge">3</span>--}}
            {{--                </a>--}}
            {{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
            {{--                    <a href="#" class="dropdown-item">--}}
            {{--                        <!-- Message Start -->--}}
            {{--                        <div class="media">--}}
            {{--                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
            {{--                            <div class="media-body">--}}
            {{--                                <h3 class="dropdown-item-title">--}}
            {{--                                    Brad Diesel--}}
            {{--                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm">Call me whenever you can...</p>--}}
            {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <!-- Message End -->--}}
            {{--                    </a>--}}
            {{--                    <div class="dropdown-divider"></div>--}}
            {{--                    <a href="#" class="dropdown-item">--}}
            {{--                        <!-- Message Start -->--}}
            {{--                        <div class="media">--}}
            {{--                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
            {{--                            <div class="media-body">--}}
            {{--                                <h3 class="dropdown-item-title">--}}
            {{--                                    John Pierce--}}
            {{--                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm">I got your message bro</p>--}}
            {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <!-- Message End -->--}}
            {{--                    </a>--}}
            {{--                    <div class="dropdown-divider"></div>--}}
            {{--                    <a href="#" class="dropdown-item">--}}
            {{--                        <!-- Message Start -->--}}
            {{--                        <div class="media">--}}
            {{--                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
            {{--                            <div class="media-body">--}}
            {{--                                <h3 class="dropdown-item-title">--}}
            {{--                                    Nora Silvester--}}
            {{--                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
            {{--                                </h3>--}}
            {{--                                <p class="text-sm">The subject goes here</p>--}}
            {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <!-- Message End -->--}}
            {{--                    </a>--}}
            {{--                    <div class="dropdown-divider"></div>--}}
            {{--                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
            {{--                </div>--}}
            {{--            </li>--}}
            <li class="nav-item">
                <a href="{{route('admin.auth.log-out')}}" class="btn btn-danger" title="Log out"><i
                        class="fa-solid fa-arrow-right-from-bracket fa-fw"></i></a>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('admin.index')}}" class="brand-link">
            {{--            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
            {{--                 style="opacity: .8">--}}
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <livewire:admin-navigation/>


        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            <small>Currently using Laravel v{{App::VERSION()}}</small>
        </div>
        <!-- Default to the left -->
        &nbsp;
    </footer>
    @include('admin._layout._messages')
</div>


@stack('modal')

<script src="{{asset('admin/js/vendors/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('admin/js/vendors/adminlte.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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
