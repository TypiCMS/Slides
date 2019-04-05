<a class="slide-list-item swiper-slide" style="background-image: url({!! $slide->present()->image(1500, 800) !!})" href="{{ $slide->present()->url }}" title="{{ $slide->present()->title_attribute }}" @if ($slide->url) target="_blank" rel="noopener noreferrer"@endif>
    <div class="slide-list-item-text slider-text">{!! $slide->present()->body !!}</div>
</a>
