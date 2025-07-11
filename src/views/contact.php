<?php
$this->layout('layout/base', [
    'title' => $seoConfig['contact']['title'],
    'description' => $seoConfig['contact']['description'],
    'keywords' => $seoConfig['contact']['keywords'],
    'ogTitle' => $seoConfig['contact']['og_title'],
    'ogDescription' => $seoConfig['contact']['og_description'],
    'ogImage' => $seoConfig['contact']['og_image'],
    'canonical' => $seoConfig['contact']['canonical']
]);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'heroTitle' => $seoConfig['contact']['hero_title'],
        'heroSubtitle' => $seoConfig['contact']['description'],
        'breadcrumb' => [
            ['label' => 'Home', 'href' => '/'],
            ['label' => 'Contato']
        ]
    ]) ?>
    <?= $this->insert('components/sections/contact') ?>
<?php $this->stop() ?> 