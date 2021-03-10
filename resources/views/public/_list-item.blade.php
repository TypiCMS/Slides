<div class="carrousel-item swiper-slide" style="background-image: url({{ $slide->present()->image(2000, 1000) }})">
    <div class="carrousel-item-container">
        <div class="carrousel-item-text slider-text">
            {!! $slide->present()->body !!}
            <a class="carrousel-item-button" href="{{ $slide->present()->url }}"
                title="{{ $slide->present()->title_attribute }}"
                {{ !empty($slide->url) ? 'target="_blank" rel="noopener noreferrer"' : '' }}>
                @lang('Read more')
            </a>
        </div>
    </div>
</div>
