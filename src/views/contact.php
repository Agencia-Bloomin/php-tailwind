<?php
$siteConfig = require __DIR__ . '/../config/site.php';

$this->layout('views/pages/base', [
    'title' => 'Contato - ' . $siteConfig['name'],
    'description' => 'Entre em contato conosco',
    'keywords' => 'contato, email'
]);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/contact') ?>
<?php $this->stop() ?> 