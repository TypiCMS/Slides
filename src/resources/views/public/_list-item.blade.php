<div class="swiper-slide">
    <a href="{{ $slide->page->uri($lang) }}" title="{{ $slide->title }}" target="_blank">
        {!! $slide->present()->thumb(1140, 500) !!}
    </a>
</div>
