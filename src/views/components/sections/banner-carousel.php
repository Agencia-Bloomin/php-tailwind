<?php
// Configuração dos banners diretamente neste arquivo
$banners = [
    [
        'title' => 'Título do Banner 1',
        'description' => 'Descrição do banner principal',
        'button_text' => 'Saiba Mais',
        'button_link' => '#',
        'image_desktop' => 'src/assets/images/banners/banner1.webp',
        'image_mobile' => 'src/assets/images/banners/bannermob1.webp',
        'alt_desktop' => 'Banner 1',
        'alt_mobile' => 'Banner Mobile 1'
    ],
    [
        'title' => 'Título do Banner 2',
        'description' => 'Descrição do segundo banner',
        'button_text' => 'Saiba Mais',
        'button_link' => '#',
        'image_desktop' => 'src/assets/images/banners/banner2.webp',
        'image_mobile' => 'src/assets/images/banners/bannermob2.webp',
        'alt_desktop' => 'Banner 2',
        'alt_mobile' => 'Banner Mobile 2'
    ],
    [
        'title' => 'Título do Banner 3',
        'description' => 'Descrição do terceiro banner',
        'button_text' => 'Saiba Mais',
        'button_link' => '#',
        'image_desktop' => 'src/assets/images/banners/banner3.webp',
        'image_mobile' => 'src/assets/images/banners/bannermob3.webp',
        'alt_desktop' => 'Banner 3',
        'alt_mobile' => 'Banner Mobile 3'
    ]
];
?>

<section class="banner-carousel relative w-full">
    <div class="swiper banner-swiper">
        <div class="swiper-wrapper">
            <?php foreach ($banners as $i => $banner): ?>
                <div class="swiper-slide">
                    <div class="banner-slide">
                        <!-- Imagem Desktop -->
                        <img src="<?= $banner['image_desktop'] ?>"
                            alt="<?= $banner['alt_desktop'] ?>"
                            class="banner-image hidden md:block">

                        <!-- Imagem Mobile -->
                        <img src="<?= $banner['image_mobile'] ?>"
                            alt="<?= $banner['alt_mobile'] ?>"
                            class="banner-image block md:hidden">

                        <div class="banner-content">
                            <?php if ($i === 0): ?>
                                <h1 class="banner-title text-white"><?= $banner['title'] ?></h1>
                            <?php else: ?>
                                <h2 class="banner-title text-white"><?= $banner['title'] ?></h2>
                            <?php endif; ?>
                            <p class="banner-description text-white"><?= $banner['description'] ?></p>
                            <a href="<?= $banner['button_link'] ?>" class="banner-button">
                                <?= $banner['button_text'] ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Navegação -->
        <div class="swiper-button-next banner-nav-next"></div>
        <div class="swiper-button-prev banner-nav-prev"></div>

        <!-- Paginação -->
        <div class="swiper-pagination banner-pagination"></div>
    </div>
</section>