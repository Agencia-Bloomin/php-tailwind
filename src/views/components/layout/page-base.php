<?php

/**
 * Template base para todas as páginas
 * Este template elimina a necessidade de duplicar código SEO em cada página
 */

// Verifica se temos configuração SEO da página
if (!isset($seoConfig)) {
    // Fallback para configuração padrão
    $seoConfig = [
        'title' => $siteConfig['site_name'],
        'description' => $siteConfig['site_name'],
        'keywords' => '',
        'og_title' => $siteConfig['site_name'],
        'og_description' => $siteConfig['site_name'],
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/'
    ];
}

// Gera schema específico se necessário
$schemaHelper = new \App\Core\SchemaHelper();
$pageName = $pageName ?? 'page'; // Nome da página será passado como parâmetro
$schema = $schema ?? $schemaHelper->generateSchema($pageName);

$this->layout('layout/base', [
    'title' => $seoConfig['title'] ?? $siteConfig['site_name'],
    'description' => $seoConfig['description'] ?? $siteConfig['site_name'],
    'keywords' => $seoConfig['keywords'] ?? '',
    'ogTitle' => $seoConfig['og_title'] ?? $seoConfig['title'] ?? $siteConfig['site_name'],
    'ogDescription' => $seoConfig['og_description'] ?? $seoConfig['description'] ?? $siteConfig['site_name'],
    'ogImage' => $seoConfig['og_image'] ?? '/src/assets/images/local.webp',
    'canonical' => $seoConfig['canonical'] ?? '/',
    'schema' => $schema
]);
?>

<?php $this->start('main_content') ?>

<?php if (isset($seoConfig['hero_title'])): ?>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">
                    <?= htmlspecialchars($seoConfig['hero_title']) ?>
                </h1>
                <?php if (isset($seoConfig['hero_description'])): ?>
                    <p class="text-xl md:text-2xl opacity-90">
                        <?= htmlspecialchars($seoConfig['hero_description']) ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Conteúdo específico da página será inserido aqui -->
<?= $this->section('page_content') ?>

<?php $this->stop() ?>