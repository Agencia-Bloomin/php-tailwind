<?php
$siteConfig = require dirname(__DIR__) . '/config/site.php';
$seoConfig = require dirname(__DIR__) . '/config/seo.php';

$this->layout('pages/base', [
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
    <?= $this->insert('components/sections/faq') ?>
    
    <?= $this->insert('components/sections/contact') ?>
<?php $this->stop() ?> 