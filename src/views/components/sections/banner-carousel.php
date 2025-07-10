<?php
// Banners desktop
$bannersDesktop = [
    'src/assets/images/banners/banner1.webp',
    'src/assets/images/banners/banner2.webp',
    'src/assets/images/banners/banner3.webp',
];
// Banners mobile
$bannersMobile = [
    'src/assets/images/banners/bannermob1.webp',
    'src/assets/images/banners/bannermob2.webp',
    'src/assets/images/banners/bannermob3.webp',
];
?>

<style>
    .banner-desktop-only {
        display: none;
    }

    .banner-mobile-only {
        display: block;
    }

    @media (min-width: 991px) {
        .banner-desktop-only {
            display: block;
        }

        .banner-mobile-only {
            display: none;
        }
    }

    /* Swiper Arrows */
    .banner-swiper-desktop .swiper-button-next,
    .banner-swiper-desktop .swiper-button-prev {
        width: 48px;
        height: 48px;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.10);
        color: #003366;
        top: 50%;
        transform: translateY(-50%);
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        border: 2px solid #c3dafe;
        opacity: 0.95;
    }

    .banner-swiper-desktop .swiper-button-next:hover,
    .banner-swiper-desktop .swiper-button-prev:hover {
        background: #003366;
        color: #fff;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.18);
        border-color: #003366;
    }

    .banner-swiper-desktop .swiper-button-next:after,
    .banner-swiper-desktop .swiper-button-prev:after {
        font-size: 1.5rem;
        font-weight: bold;
    }

    /* Swiper Dots */
    .banner-swiper-desktop .swiper-pagination-bullets,
    .banner-swiper-mobile .swiper-pagination-bullets {
        bottom: 12px !important;
    }

    .banner-swiper-desktop .swiper-pagination-bullet,
    .banner-swiper-mobile .swiper-pagination-bullet {
        width: 14px;
        height: 14px;
        background: #c3dafe;
        opacity: 1;
        border-radius: 50%;
        margin: 0 4px !important;
        transition: background 0.2s, transform 0.2s;
        border: 2px solid #fff;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
    }

    .banner-swiper-desktop .swiper-pagination-bullet-active,
    .banner-swiper-mobile .swiper-pagination-bullet-active {
        background: #003366;
        transform: scale(1.2);
        border-color: #003366;
    }
</style>

<div class="w-full my-8">
    <!-- Swiper Desktop -->
    <div class="swiper banner-swiper-desktop banner-desktop-only">
        <div class="swiper-wrapper">
            <?php foreach ($bannersDesktop as $img): ?>
                <div class="swiper-slide">
                    <img src="<?= $img ?>" alt="Banner" title="Banner" class="w-full h-auto object-cover" loading="lazy" />
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <!-- Swiper Mobile -->
    <div class="swiper banner-swiper-mobile banner-mobile-only">
        <div class="swiper-wrapper">
            <?php foreach ($bannersMobile as $img): ?>
                <div class="swiper-slide">
                    <img src="<?= $img ?>" alt="Banner Mobile" title="Banner Mobile" class="w-full h-auto object-cover" loading="lazy" />
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>