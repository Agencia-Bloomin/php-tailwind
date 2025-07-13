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

<?= $this->insert('components/sections/banner-carousel') ?>
<?= $this->insert('components/sections/services') ?>
<?= $this->insert('components/sections/about') ?>
<?= $this->insert('components/sections/faq') ?>
<?= $this->insert('components/sections/contact') ?>

<?php $this->stop() ?>