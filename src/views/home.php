<?php
$siteConfig = require dirname(__DIR__) . '/config/site.php';
$seoConfig = require dirname(__DIR__) . '/config/seo.php';

// Gerar schema específico para a home
$schemaHelper = new \App\Core\SchemaHelper();
$localBusinessSchema = $schemaHelper->generateLocalBusinessSchema();

$this->layout('layout/base', [
    'title' => $seoConfig['home']['title'],
    'description' => $seoConfig['home']['description'],
    'keywords' => $seoConfig['home']['keywords'],
    'ogTitle' => $seoConfig['home']['og_title'],
    'ogDescription' => $seoConfig['home']['og_description'],
    'ogImage' => $seoConfig['home']['og_image'],
    'canonical' => $seoConfig['home']['canonical'],
    'schema' => $localBusinessSchema
]);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/banner-carousel') ?>

<?= $this->insert('components/sections/about') ?>

<?= $this->insert('components/sections/services') ?>
    
    <?= $this->insert('components/sections/faq') ?>

    <?= $this->insert('components/sections/contact') ?>
    
<?php $this->stop() ?> 