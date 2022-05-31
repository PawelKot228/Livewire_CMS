@php
    /**
    * @var \App\Models\ArticleCategory $item
    * @var \App\Models\GalleryItem $cover
    */

    $cover = $item->getCover();
@endphp
<div class="card shadow-sm">

    <div class="card-img-top">
        <img class="img-thumbnail" src="{{$item->getCoverUrl()}}" alt="">
    </div>

    <div class="card-body">
        <p class="card-text">{{$item->article_category_title}}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="{{$item->url()}}" class="btn btn-sm btn-outline-secondary">View</a>
{{--                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
            </div>
{{--            <small class="text-muted">9 mins</small>--}}
        </div>
    </div>
</div>
