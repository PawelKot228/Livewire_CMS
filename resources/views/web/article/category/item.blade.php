@php
    /**
    * @var \App\Models\ArticleCategory $item
    * @var \App\Models\GalleryItem $cover
    */

    $cover = $item->getCover();
@endphp
{{--@dd($item->getCover()->getUrl())--}}

<div class="card shadow-sm">
    @if($cover)
    <div class="card-img-top">
        <img class="img-thumbnail" src="{{$cover->getUrl()}}" alt="">
    </div>
    @endif
{{--    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg"--}}
{{--         role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">--}}
{{--        <title>Placeholder</title>--}}
{{--        <rect width="100%" height="100%" fill="#55595c" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#43484b;"></rect>--}}
{{--        <text x="50%" y="50%" fill="#eceeef" dy=".3em" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#dddad6;">Thumbnail</text>--}}
{{--    </svg>--}}
{{--@dd($item)--}}
    <div class="card-body">
        <p class="card-text">{{$item->article_category_title}}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="{{$item->url()}}" class="btn btn-sm btn-outline-secondary">View</a>
{{--                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
            </div>
            <small class="text-muted">9 mins</small>
        </div>
    </div>
</div>
