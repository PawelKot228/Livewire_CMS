@php
    /**
    * @var \App\Models\Article $item
    * @var \App\Models\GalleryItem $cover
    */

    $cover = $item->getCover();
@endphp
{{--@dd($item->getCover()->getUrl())--}}
{{--@dd($item)--}}
<div class="article-item">

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
            <img src="{{$cover->getUrl()}}" class="img-fluid" />
            <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
        </div>
    </div>

    <div class="col-md-8 mb-4">
        <h5>{!! $item->article_title !!}</h5>
        <p>{!! $item->article_lead !!}</p>
        <a href="{{$item->url()}}" class="btn btn-primary">Read</a>
    </div>
</div>
</div>


{{--<div class="card shadow-sm">--}}
{{--    @if($cover)--}}
{{--    <div class="card-img-top">--}}
{{--        <img class="img-thumbnail" src="{{$cover->getUrl()}}" alt="">--}}
{{--    </div>--}}
{{--    @endif--}}
{{--    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg"--}}
{{--         role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">--}}
{{--        <title>Placeholder</title>--}}
{{--        <rect width="100%" height="100%" fill="#55595c" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#43484b;"></rect>--}}
{{--        <text x="50%" y="50%" fill="#eceeef" dy=".3em" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#dddad6;">Thumbnail</text>--}}
{{--    </svg>--}}
{{--@dd($item)--}}
{{--    <div class="card-body">--}}
{{--        <p class="card-text">{{$item->article_category_title}}</p>--}}
{{--        <div class="d-flex justify-content-between align-items-center">--}}
{{--            <div class="btn-group">--}}
{{--                <a href="{{$item->url()}}" class="btn btn-sm btn-outline-secondary">View</a>--}}
{{--                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
{{--            </div>--}}
{{--            <small class="text-muted">9 mins</small>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
