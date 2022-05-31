@php
    /**
    * @var \App\Models\Article $item
    * @var \App\Models\GalleryItem $cover
    */

    $cover = $item->getCover();
@endphp

<div class="article-item">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                <img src="{{$item->getCoverUrl()}}" class="img-fluid"/>
                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
            </div>
        </div>

        <div class="col-md-8 mb-4">
            <small class="text-black-50"><b>{{$item->category->article_category_title}}</b></small>
            <h5>{!! $item->article_title !!}</h5>
            <p>{!! $item->article_lead !!}</p>
            <a href="{{$item->url()}}" class="btn btn-primary">Read</a>
        </div>
    </div>
</div>
