<div class="slide-list-item swiper-slide" style="background-image: url({{ $slide->present()->image(2000, 1000) }})">
    <div class="slide-list-item-container">
        <div class="slide-list-item-content" data-swiper-parallax="-300">
            <p class="slide-list-item-text slider-text">
                {!! nl2br($slide->body) !!}
            </p>
            <a class="slide-list-item-button" href="{{ $slide->present()->url }}" title="{{ $slide->present()->title_attribute }}"
                {{ !empty($slide->url) ? 'target="_blank" rel="noopener noreferrer"' : '' }}>
                @lang('Read more')
            </a>
        </div>
    </div>
</div>
