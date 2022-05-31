@extends('web._layout.default')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Current article categories</h1>
            </div>
        </div>
    </section>

    @include('web.article.category.home')

@endsection
