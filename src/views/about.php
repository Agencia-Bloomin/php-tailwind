<?php
$this->layout('layout/base', [
    'title' => $seoConfig['about']['title'],
    'description' => $seoConfig['about']['description'],
    'keywords' => $seoConfig['about']['keywords'],
    'ogTitle' => $seoConfig['about']['og_title'],
    'ogDescription' => $seoConfig['about']['og_description'],
    'ogImage' => $seoConfig['about']['og_image'],
    'canonical' => $seoConfig['about']['canonical']
]);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'heroTitle' => $seoConfig['about']['hero_title'],
        'heroSubtitle' => $seoConfig['about']['description'],
        'breadcrumb' => [
            ['label' => 'Home', 'href' => '/'],
            ['label' => 'Sobre Nós']
        ]
    ]) ?>

    <?= $this->insert('components/sections/about') ?>
    
    <?= $this->insert('components/sections/contact') ?>
<?php $this->stop() ?> 