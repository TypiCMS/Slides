<a class="swiper-slide" style="background: url({!! $slide->present()->thumbSrc(1140, 500) !!})" href="{{ $slide->page->uri($lang) }}" title="{{ $slide->title }}" target="_blank">
    <div class="slider-text">{!! $slide->present()->body !!}</div>
</a>
