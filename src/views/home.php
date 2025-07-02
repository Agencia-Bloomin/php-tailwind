<?php
$siteConfig = require __DIR__ . '/../config/site.php';

$this->layout('views/pages/base', [
    'title' => 'Página Inicial - ' . $siteConfig['name'],
    'description' => $siteConfig['tagline'],
    'keywords' => $siteConfig['seo']['keywords']
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