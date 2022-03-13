<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin auth</title>

    <link rel="stylesheet" href="{{asset('admin/css/vendors/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/vendors/bootstrap4-toggle.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script>
        const csrf_token = "{{csrf_token()}}";
    </script>

@livewireStyles
@stack('css')

<body class="login-page {{Session::get('dark_mode', true) ? 'dark-mode' : ''}}">
<div class="login-box">
    @yield('content')
</div>

@stack('modal')

<script src="{{asset('admin/js/vendors/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('admin/js/vendors/adminlte.min.js')}}"></script>
<script src="{{asset('admin/js/vendors/bootstrap4-toggle.min.js')}}"></script>
<script src="{{asset('admin/js/admin.js')}}"></script>

@livewireScripts
@stack('js')

</body>
</html>
