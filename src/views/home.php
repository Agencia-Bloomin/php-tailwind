<?php
$siteConfig = require dirname(__DIR__) . '/config/site.php';
$seoConfig = require dirname(__DIR__) . '/config/seo.php';

$this->layout('pages/base', [
    'title' => $seoConfig['home']['title'],
    'description' => $seoConfig['home']['description'],
    'keywords' => $seoConfig['home']['keywords'],
    'ogTitle' => $seoConfig['home']['og_title'],
    'ogDescription' => $seoConfig['home']['og_description'],
    'ogImage' => $seoConfig['home']['og_image'],
    'canonical' => $seoConfig['home']['canonical']
]);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'title' => $siteConfig['name'],
        'description' => 'Transformamos inovação em resultados precisos. Com equipamentos modernos e equipe qualificada, realizamos soldagens milimétricas com tecnologia laser de ponta, garantindo qualidade, durabilidade e total controle do processo.',
        'keywords' => $siteConfig['seo']['keywords'],
        'buttons' => [
            [
                'text' => 'Saiba mais',
                'href' => '#',
                'variant' => 'primary'
            ]
        ]
    ]) ?>

<?= $this->insert('components/sections/about') ?>

<?= $this->insert('components/sections/services') ?>
    
    <?= $this->insert('components/sections/faq') ?>

    <?= $this->insert('components/sections/contact') ?>
    
<?php $this->stop() ?> 