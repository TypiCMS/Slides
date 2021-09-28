<div class="slide-list-item swiper-slide" style="background-image: url({{ $slide->present()->image(2000, 1000) }})">
    <div class="slide-list-item-container">
        <div class="slide-list-item-text slider-text">
            {!! $slide->present()->body !!}
            <a class="slide-list-item-button" href="{{ $slide->present()->url }}"
                title="{{ $slide->present()->title_attribute }}"
                {{ !empty($slide->url) ? 'target="_blank" rel="noopener noreferrer"' : '' }}>
                @lang('Read more')
            </a>
        </div>
    </div>
</div>
