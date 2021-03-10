<div class="carrousel-items swiper-wrapper">
    @foreach ($items as $slide)
    @include('slides::public._list-item')
    @endforeach
</div>
@if ($items->count() > 1)
<div class="carrousel-button carrousel-button-prev swiper-button-prev swiper-button-black"></div>
<div class="carrousel-button carrousel-button-next swiper-button-next swiper-button-black"></div>
@endif
