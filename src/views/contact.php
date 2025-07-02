<?php
$siteConfig = require dirname(__DIR__) . '/config/site.php';
$seoConfig = require dirname(__DIR__) . '/config/seo.php';

$this->layout('pages/base', [
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
    <?= $this->insert('components/sections/contact') ?>
<?php $this->stop() ?> 