@php
    $title = $title ?? '';
    $lead = $lead ?? '';
    $image = $image ?? '';
@endphp

<section id="intro" class="d-flex align-items-center" style="{{$image ? "background-image: url('$image')" : ''}}">
    <div class="container">
        @if($title)
            <h1>{{$title}}</h1>
        @endif
        @if($lead)
            <h2>{{$lead}}</h2>
        @endif
    </div>
</section>
