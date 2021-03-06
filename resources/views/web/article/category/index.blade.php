@extends('web._layout.default')

@php
    /**
    * @var \App\Models\ArticleCategory $article_category
    * @var \App\Models\Article $articles
    */
    $cover = $article_category->getCover();
@endphp

@section('content')
    @include('web._layout.intro', [
        'title' => $article_category->article_category_title,
        'lead' => $article_category->article_category_lead,
        'image' => $cover->getUrl() ?? '']
    )

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 g-3">
                @foreach($articles as $item)
                    <div class="col">
                        @include('web.article.item', ['item' => $item])
                    </div>
                @endforeach
                {!! $articles->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>

@endsection
