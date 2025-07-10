<?php
$seoConfig = require dirname(__DIR__) . '/config/seo.php';

$this->layout('layout/base', [
    'title' => $seoConfig['405']['title'],
    'description' => $seoConfig['405']['description'],
    'keywords' => $seoConfig['405']['keywords'],
    'ogTitle' => $seoConfig['405']['og_title'],
    'ogDescription' => $seoConfig['405']['og_description'],
    'ogImage' => $seoConfig['405']['og_image'],
    'canonical' => $seoConfig['405']['canonical']
]);
?>

<?php $this->start('main_content') ?>
<div class="error-page container mx-auto h-[60vh] flex items-center justify-center">
    <div class="card">
        <div class="text-center">
            <h1 class="text-6xl font-bold mb-4" style="color: var(--color-warning);">405</h1>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Método não permitido</h2>
            <p class="text-gray-600 mb-8">Desculpe, o método de requisição que você está usando não é permitido para esta página.</p>
            <div class="flex justify-center gap-4">
                <a href="/" class="btn btn-primary">Voltar para a página inicial</a>
                <a href="/contato" class="btn btn-secondary">Contato</a>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>