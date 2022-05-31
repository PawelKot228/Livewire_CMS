<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">

    <script>
        const csrf_token = "{{csrf_token()}}";
    </script>
    @php
        use App\Models\Constant;
        $user = Auth::guard('admin')->user();
    @endphp

    @livewireStyles
    @stack('css')
</head>
<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <div class="text-white-50">
                        {!! Constant::getConstant('company_description') !!}
                    </div>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{Constant::getConstant('company_twitter')}}" class="text-white">Follow on Twitter</a></li>
                        <li><a href="{{Constant::getConstant('company_facebook')}}" class="text-white">Like on Facebook</a></li>
                        <li><a href="{{Constant::getConstant('company_linkedin')}}" class="text-white">Check our linkedin</a></li>
                        <li><a href="mailto:{{Constant::getConstant('company_email')}}" class="text-white">Email me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="{{route('web.index')}}" class="navbar-brand d-flex align-items-center">
                <i class="fa-solid fa-newspaper"></i>
                <strong style="margin-left: .5em">{{Constant::getConstant('company_name')}}</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<main>

@yield('content')

</main>

<footer class="text-muted py-5">
    <div class="container">
        {!! Constant::getConstant('company_address') !!}
    </div>
</footer>



@stack('modal')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="{{asset('admin/js/main.js')}}"></script>

@livewireScripts
@stack('js')

</body>
</html>
