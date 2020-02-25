<div class="carrousel container-slides {{ $items->count() > 1 ? 'swiper-container' : '' }}">
    @include('slides::public._list')
    @if ($items->count() > 1)
    <div class="carrousel-pagination swiper-pagination"></div>
    @endif
</div>
