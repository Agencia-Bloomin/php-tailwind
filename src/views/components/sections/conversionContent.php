<?php
$pageData = $pageData ?? [];
$api = $api ?? new App\Core\ApiClient();
$slug = $this->e($slug ?? '');
?>

<section class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="container mx-auto px-4 relative">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
            <aside class="lg:col-span-1">
                <div class="sticky top-24">
                    <div class="bg-white p-8 rounded-2xl shadow-lg">
                        <div class="flex items-center space-x-3 mb-6">
                            <span class="iconify w-6 h-6 text-primary" data-icon="mdi:menu"></span>
                            <h3 class="text-xl font-semibold text-gray-900">Navegação</h3>
                        </div>
                        <nav class="space-y-1">
                            <?php foreach ($api->getAllPages() as $page): ?>
                                <a href="./<?= $page->url ?>"
                                    title="Ir para <?= $page->name ?>"
                                    class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300 <?= $page->url === $slug ? 'bg-primary4 text-primary font-medium' : 'text-gray-600 hover:bg-gray-50' ?>">
                                    <span class="iconify w-5 h-5 <?= $page->url === $slug ? 'text-primary' : 'text-gray-400' ?>" data-icon="mdi:chevron-right"></span>
                                    <span><?= $page->name ?></span>
                                </a>
                            <?php endforeach; ?>
                        </nav>
                    </div>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <?php if (!empty($pageData['gallery']) || !empty($pageData['cover'])): ?>
                        <div class="grid grid-cols-1 gap-6 mb-12">
                            <div class="relative group overflow-hidden rounded-xl">
                                <img src="<?= $this->e($pageData['cover']) ?>"
                                    alt="<?= $this->e($pageData['title']) ?>"
                                    title="<?= $this->e($pageData['title']) ?>"
                                    class="w-full max-h-[300px] object-cover rounded-xl transform transition-transform duration-500 group-hover:scale-105"
                                    loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <?php if (!empty($pageData['gallery'])): ?>
                                <div class="grid grid-cols-2 gap-4">
                                    <?php foreach ($pageData['gallery'] as $image): ?>
                                        <div class="relative group overflow-hidden rounded-xl">
                                            <img src="<?= $this->e($image) ?>"
                                                alt="<?= $this->e($pageData['title']) ?>"
                                                title="<?= $this->e($pageData['title']) ?>"
                                                class="w-full h-48 object-cover rounded-xl transform transition-transform duration-500 group-hover:scale-105"
                                                loading="lazy">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <article class="prose prose-lg max-w-none">
                        <div class="content">
                            <?= htmlspecialchars_decode($pageData['content']) ?>
                        </div>
                    </article>

                    <div class="mt-12 pt-8 border-t border-gray-100">
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-gray-500">Compartilhe:</span>
                                <div class="flex space-x-2">
                                    <a href="#" title="Compartilhar no Facebook" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition-all duration-300">
                                        <span class="iconify w-4 h-4" data-icon="mdi:facebook"></span>
                                    </a>
                                    <a href="#" title="Compartilhar no YouTube" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition-all duration-300">
                                        <span class="iconify w-4 h-4" data-icon="mdi:youtube"></span>
                                    </a>
                                    <a href="#" title="Compartilhar no LinkedIn" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition-all duration-300">
                                        <span class="iconify w-4 h-4" data-icon="mdi:linkedin"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2 text-gray-500">
                                <span class="iconify w-5 h-5" data-icon="mdi:clock-outline"></span>
                                <span class="text-sm">Última atualização: <?= date('d/m/Y') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>