/**
 * Carousel
 */
new Swiper('.carousel', {
    loop: true,
    grabCursor: true,
    speed: 500,
    autoplay: {
        delay: 6000,
    },
    // setWrapperSize: true, // Explorer compatibility
    pagination: {
        el: '.carrousel-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
