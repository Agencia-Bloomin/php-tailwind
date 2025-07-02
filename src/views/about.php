<?php
$siteConfig = require dirname(__DIR__) . '/config/site.php';
$seoConfig = require dirname(__DIR__) . '/config/seo.php';

$this->layout('pages/base', [
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
    <?= $this->insert('components/sections/about') ?>
    
    <?= $this->insert('components/sections/contact') ?>
<?php $this->stop() ?> 