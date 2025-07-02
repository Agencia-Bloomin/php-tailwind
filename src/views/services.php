<?php
$siteConfig = require __DIR__ . '/../config/site.php';
$seoConfig = require __DIR__ . '/../config/seo.php';

$this->layout('views/pages/base', [
    'title' => $seoConfig['services']['title'],
    'description' => $seoConfig['services']['description'],
    'keywords' => $seoConfig['services']['keywords'],
    'ogTitle' => $seoConfig['services']['og_title'],
    'ogDescription' => $seoConfig['services']['og_description'],
    'ogImage' => $seoConfig['services']['og_image'],
    'canonical' => $seoConfig['services']['canonical']
]);
?>

<?php $this->start('main_content') ?>

    <?= $this->insert('components/sections/detailedServices') ?>
    
    <?= $this->insert('components/sections/faq') ?>

    <?= $this->insert('components/sections/contact') ?>
<?php $this->stop() ?> 