@php
    $title = $title ?? '';
    $lead = $lead ?? '';
    $image = $image ?? '';
@endphp

<section id="intro" class="d-flex align-items-center" style="{{$image ? "background-image: url('$image')" : ''}}">
    <div class="container">
        @if($title)
            <h1 class="text-white">{{$title}}</h1>
        @endif
        @if($lead)
            <h4 class="text-white-50">{{$lead}}</h4>
        @endif
    </div>
</section>
