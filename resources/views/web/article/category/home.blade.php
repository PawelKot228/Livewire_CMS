@php
    use App\Models\ArticleCategory;
    $cats = ArticleCategory::getCategories();
@endphp

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($cats as $item)
                <div class="col">
                    @include('web.article.category.item', ['item' => $item])
                </div>
            @endforeach
            {!! $cats->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
