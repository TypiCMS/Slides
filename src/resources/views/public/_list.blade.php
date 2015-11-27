<div class="list-slides swiper-wrapper">
    @foreach ($items as $slide)
    @include('slides::public._list-item')
    @endforeach
</div>
<div class="swiper-pagination"></div>
<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>
