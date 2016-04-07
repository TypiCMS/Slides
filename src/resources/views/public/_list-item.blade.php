<a class="swiper-slide" style="background: url({!! $slide->present()->thumbSrc(1500, 800) !!})" href="{{ $slide->present()->url }}" title="{{ $slide->present()->title_attribute }}" @if ($slide->url) target="_blank"@endif>
    <div class="slider-text">{!! $slide->present()->body !!}</div>
</a>
