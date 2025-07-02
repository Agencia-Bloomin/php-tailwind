<?php

use App\Core\ApiClient;

$api = new ApiClient();
$pages = $api->getAllPages();

$siteConfig = require __DIR__ . '/../config/site.php';
$seoConfig = require __DIR__ . '/../config/seo.php';

$this->layout('views/pages/base', [
    'title' => $seoConfig['sitemap']['title'],
    'description' => $seoConfig['sitemap']['description'],
    'keywords' => $seoConfig['sitemap']['keywords'],
    'ogTitle' => $seoConfig['sitemap']['og_title'],
    'ogDescription' => $seoConfig['sitemap']['og_description'],
    'ogImage' => $seoConfig['sitemap']['og_image'],
    'canonical' => $seoConfig['sitemap']['canonical']
]);
?>

<?php $this->start('main_content') ?>
<section class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="container mx-auto px-4 relative">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h1 class="text-4xl font-bold mb-6 bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                Mapa do Site
            </h1>
            <p class="text-lg text-gray-600 leading-relaxed">
                Explore todas as páginas disponíveis em nosso site. Navegue facilmente por nossos conteúdos e encontre exatamente o que você procura.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            <?php foreach ($pages as $page): ?>
                <a href="./<?= $page->url ?>"
                    class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-primary-light rounded-xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:bg-primary">
                                <span class="iconify w-6 h-6 text-primary group-hover:text-white" data-icon="mdi:file-document"></span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-xl font-semibold text-gray-900 group-hover:text-primary mb-3 transition-colors duration-300">
                                <?= $page->name ?>
                            </h2>
                            <?php if (!empty($page->description)): ?>
                                <p class="text-gray-600 mb-4 leading-relaxed">
                                    <?= $page->description ?>
                                </p>
                            <?php endif; ?>
                            <div class="flex items-center text-primary font-medium">
                                <span>Ver página</span>
                                <span class="iconify w-5 h-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" data-icon="mdi:arrow-right"></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="mt-16 text-center">
            <div class="inline-flex items-center space-x-2 text-gray-600">
                <span class="iconify w-5 h-5" data-icon="mdi:information"></span>
                <p>Não encontrou o que procura? Entre em contato conosco.</p>
            </div>
            <div class="mt-6">
                <?= $this->insert('components/common/button', [
                    'text' => 'Fale Conosco',
                    'href' => '/contato',
                    'variant' => 'primary',
                    'icon' => 'mdi:email'
                ]) ?>
            </div>
        </div>
    </div>
</section>
<?php $this->stop() ?>