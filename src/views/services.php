<?php
$siteConfig = require __DIR__ . '/../config/site.php';

$this->layout('views/layouts/base', [
    'title' => 'Página Inicial - ' . $siteConfig['name'],
    'description' => $siteConfig['tagline'],
    'keywords' => $siteConfig['seo']['keywords']
]);
?>

<?php $this->start('main_content') ?>

    <?= $this->insert('components/sections/detailedServices') ?>
    
    <?= $this->insert('components/sections/faq') ?>

    <?= $this->insert('components/sections/contact') ?>
<?php $this->stop() ?> 