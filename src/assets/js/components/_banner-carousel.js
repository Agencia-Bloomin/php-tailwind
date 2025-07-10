// Swiper para banners desktop
if (document.querySelector('.banner-swiper-desktop')) {
    new Swiper('.banner-swiper-desktop', {
        loop: true,
        pagination: {
            el: '.banner-swiper-desktop .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.banner-swiper-desktop .swiper-button-next',
            prevEl: '.banner-swiper-desktop .swiper-button-prev',
        },
        slidesPerView: 1,
        spaceBetween: 0,
        effect: 'slide',
    });
}
// Swiper para banners mobile
if (document.querySelector('.banner-swiper-mobile')) {
    new Swiper('.banner-swiper-mobile', {
        loop: true,
        pagination: {
            el: '.banner-swiper-mobile .swiper-pagination',
            clickable: true,
        },
        slidesPerView: 1,
        spaceBetween: 0,
        effect: 'slide',
    });
} 