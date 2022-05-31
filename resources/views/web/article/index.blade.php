@extends('web._layout.default')

@php
    /**
    * @var \App\Models\ArticleCategory $article
    */
    $cover = $article->getCover();
@endphp

@section('content')
    @include('web._layout.intro', [
        'title' => $article->article_title,
        'lead' => $article->article_lead,
        'image' => $article->getCoverUrl()]
    )

    <div class="container-article">
        {!! $article->article_text !!}
    </div>

{{--    <div class="album py-5 bg-light">--}}
{{--        <div class="container">--}}

{{--            <div class="row row-cols-1 row-cols-sm-2 g-3">--}}
{{--                @foreach($article_category->articles as $item)--}}
{{--                    <div class="col">--}}
{{--                        @include('web.article.item', ['item' => $item])--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
