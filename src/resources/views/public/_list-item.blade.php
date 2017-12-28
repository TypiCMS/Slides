<a class="swiper-slide" style="background-image: url({!! $slide->present()->thumbSrc(1500, 800) !!})" href="{{ $slide->present()->url }}" title="{{ $slide->present()->title_attribute }}" @if ($slide->url) target="_blank" rel="noopener noreferrer"@endif>
    <div class="slider-text">{!! $slide->present()->body !!}</div>
</a>
