<?php
// Usa o template base que já inclui toda a configuração SEO
$this->insert('components/layout/page-base');

// Define o conteúdo específico da página
$this->start('page_content');
?>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Post 1 -->
            <article class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="/src/assets/images/no-image.png" alt="Post 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Como Otimizar SEO</h3>
                    <p class="text-gray-600 mb-4">Dicas essenciais para melhorar o SEO do seu site...</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">15 Jan 2024</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Ler mais</a>
                    </div>
                </div>
            </article>

            <!-- Post 2 -->
            <article class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="/src/assets/images/no-image.png" alt="Post 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Design Responsivo</h3>
                    <p class="text-gray-600 mb-4">A importância do design responsivo nos dias de hoje...</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">10 Jan 2024</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Ler mais</a>
                    </div>
                </div>
            </article>

            <!-- Post 3 -->
            <article class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="/src/assets/images/no-image.png" alt="Post 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Performance Web</h3>
                    <p class="text-gray-600 mb-4">Técnicas para melhorar a performance do seu site...</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">05 Jan 2024</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Ler mais</a>
                    </div>
                </div>
            </article>

        </div>

        <!-- Paginação -->
        <div class="mt-12 flex justify-center">
            <nav class="flex space-x-2">
                <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">1</a>
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">2</a>
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">3</a>
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Próximo</a>
            </nav>
        </div>
    </div>
</div>

<?php $this->stop() ?>