<?php
$this->layout('layout/base', [
    'title' => $seoConfig['title'] ?? $siteConfig['site_name'],
    'description' => $seoConfig['description'] ?? $siteConfig['site_name'],
    'keywords' => $seoConfig['keywords'] ?? '',
    'ogTitle' => $seoConfig['og_title'] ?? $seoConfig['title'] ?? $siteConfig['site_name'],
    'ogDescription' => $seoConfig['og_description'] ?? $seoConfig['description'] ?? $siteConfig['site_name'],
    'ogImage' => $seoConfig['og_image'] ?? '',
    'canonical' => $seoConfig['canonical'] ?? '/',
    'schema' => $schema ?? null,
]);
$this->start('main_content');
?>

<?= $this->insert('components/sections/hero', [
    'heroTitle' => $seoConfig['hero_title'] ?? $seoConfig['title'],
    'heroSubtitle' => $seoConfig['description'] ?? '',
    'breadcrumb' => [
        ['label' => 'Início', 'href' => '/'],
        ['label' => 'Perguntas Frequentes']
    ]
]) ?>

<?= $this->insert('components/sections/faq') ?>
<?= $this->insert('components/sections/contact') ?>

<?php $this->stop() ?>