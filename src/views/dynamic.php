<?php

use App\Core\ApiClient;

$api = new ApiClient();
$slug = $this->e($slug ?? '');
$pageData = $api->getPageMetadata($slug);

if (!$pageData || empty($pageData['content'])) {
    header("HTTP/1.0 404 Not Found");
    echo $this->insert('views/404');
    exit;
}


$seoConfig = require __DIR__ . '/../config/seo.php';

$this->layout('views/pages/base', [
    'title' => $pageData['title'] . ' - ' . $seoConfig['global']['site_name'],
    'description' => $pageData['description'],
    'keywords' => $pageData['keywords'] ?? $seoConfig['global']['site_description'],
    'ogTitle' => $pageData['title'],
    'ogDescription' => $pageData['description'],
    'ogImage' => $pageData['cover'],
    'canonical' => '/' . $slug
]);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'title' => $pageData['title'],
        'description' => $pageData['description'],
        'image' => $pageData['cover']
    ]) ?>

    <?= $this->insert('components/sections/conversionContent', [
        'slug' => $slug,
        'pageData' => $pageData
    ]) ?>

    <?= $this->insert('components/sections/about', [
        'title' => $pageData['title'],
        'description' => $pageData['description'],
        'image' => $pageData['cover']
    ]) ?>

    <?= $this->insert('components/sections/services', [
        'title' => $pageData['title'],
        'description' => $pageData['description'],
        'image' => $pageData['cover']
    ]) ?>

    <?= $this->insert('components/sections/contact') ?>

    <?= $this->insert('components/sections/faq') ?>

<?php $this->stop() ?> 