<div class="container-slides swiper-container {{ $items->count() > 1 ? 'carrousel' : '' }}">
    @include('slides::public._list')
    @if ($items->count() > 1)
    <div class="carrousel-pagination swiper-pagination"></div>
    @endif
</div>
