<?php
$this->layout('layout/base', [
    'title' => $seoConfig['faq']['title'],
    'description' => $seoConfig['faq']['description'],
    'keywords' => $seoConfig['faq']['keywords'],
    'ogTitle' => $seoConfig['faq']['og_title'],
    'ogDescription' => $seoConfig['faq']['og_description'],
    'ogImage' => $seoConfig['faq']['og_image'],
    'canonical' => $seoConfig['faq']['canonical']
]);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'heroTitle' => $seoConfig['faq']['hero_title'],
        'heroSubtitle' => $seoConfig['faq']['description'],
        'breadcrumb' => [
            ['label' => 'Home', 'href' => '/'],
            ['label' => 'Perguntas Frequentes']
        ]
    ]) ?>

    <?= $this->insert('components/sections/faq') ?>
    
    <?= $this->insert('components/sections/contact') ?>
<?php $this->stop() ?> 