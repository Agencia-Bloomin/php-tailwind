<?php
$year = date('Y');
$siteConfig = require dirname(__DIR__, 3) . '/config/site.php';
$companyName = $siteConfig['company_name'];

$footerLinks = [
    [
        'title' => 'Navegação',
        'icon' => 'mdi:map-marker-radius',
        'links' => [
            ['text' => 'Início', 'href' => './', 'icon' => 'mdi:home-outline'],
            ['text' => 'Sobre Nós', 'href' => 'sobre', 'icon' => 'mdi:laser-pointer'],
            ['text' => 'Serviços', 'href' => 'servicos', 'icon' => 'mdi:laser-pointer'],
            ['text' => 'Contato', 'href' => './contato', 'icon' => 'mdi:phone-outline']
        ]
    ]
];

$socialLinks = [];
if (!empty($siteConfig['social']['linkedin'])) {
    $socialLinks[] = ['icon' => 'mdi:linkedin', 'href' => $siteConfig['social']['linkedin']];
}
if (!empty($siteConfig['social']['instagram'])) {
    $socialLinks[] = ['icon' => 'mdi:instagram', 'href' => $siteConfig['social']['instagram']];
}
if (!empty($siteConfig['social']['facebook'])) {
    $socialLinks[] = ['icon' => 'mdi:facebook', 'href' => $siteConfig['social']['facebook']];
}
if (!empty($siteConfig['social']['youtube'])) {
    $socialLinks[] = ['icon' => 'mdi:youtube', 'href' => $siteConfig['social']['youtube']];
}
?>

<footer class="bg-gradient-to-br from-primary to-primary2 text-white py-12 relative overflow-hidden">
    <!-- Efeito de fundo sutil -->
    <div class="absolute inset-0 opacity-5">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#FFFFFF" fill-opacity="0.1" d="M0,160L48,176C96,192,192,224,288,229.3C384,235,480,213,576,186.7C672,160,768,128,864,133.3C960,139,1056,181,1152,197.3C1248,213,1344,203,1392,197.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <!-- Seção principal do footer -->
        <div class="flex flex-col items-center gap-6 mb-8">
            <!-- Logo, nome e texto -->
            <div class="flex flex-col items-center text-center gap-2">
                <div class="flex items-center space-x-3 mb-1">
                    <span class="iconify w-12 h-12 text-white" data-icon="mdi:laser-pointer"></span>
                    <h3 class="text-2xl font-bold text-white tracking-tight">
                        <?= $this->e($companyName) ?>
                    </h3>
                </div>
                <p class="text-gray-300 text-base max-w-md leading-relaxed mt-2">
                    Especialistas em soluções de alta precisão para aplicações industriais.
                </p>
            </div>
            <!-- Links de navegação em linha -->
            <nav class="w-full flex justify-center">
                <ul class="flex flex-wrap gap-6">
                    <?php foreach ($footerLinks[0]['links'] as $link): ?>
                        <li>
                            <a href="<?= $this->e($link['href']) ?>"
                                title="Ir para <?= $this->e($link['text']) ?>"
                                class="text-gray-300 hover:text-white transition-all duration-300 flex items-center gap-2 group">
                                <span class="iconify w-4 h-4 opacity-50 group-hover:opacity-100 transition-opacity"
                                    data-icon="<?= $this->e($link['icon']) ?>"></span>
                                <span class="text-sm font-medium"><?= $this->e($link['text']) ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>

        <!-- Redes sociais -->
        <?php if (!empty($socialLinks)): ?>
            <div class="flex justify-center mb-6">
                <div class="flex space-x-3">
                    <?php foreach ($socialLinks as $social): ?>
                        <a href="<?= $this->e($social['href']) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Siga-nos no <?= ucfirst(str_replace('mdi:', '', $social['icon'])) ?>"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-white hover:bg-white/20 transition-all duration-300 transform hover:scale-110">
                            <span class="iconify w-5 h-5" data-icon="<?= $this->e($social['icon']) ?>"></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Linha divisória -->
        <hr class="border-t border-white/20 mb-6">

        <!-- Linha inferior: copyright | logo Bloomin -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div class="flex-1 flex items-center justify-center md:justify-start space-x-2 text-gray-300 text-sm mb-2 md:mb-0">
                <span class="iconify w-4 h-4" data-icon="mdi:copyright"></span>
                <p>&copy; <?= $year ?> <?= $this->e($companyName) ?>. Todos os direitos reservados.</p>
            </div>
            <div class="flex-1"></div>
            <div class="flex-1 flex items-center justify-center md:justify-end space-x-2">
                <a href="https://bloomin.com.br"
                    target="_blank"
                    rel="noopener noreferrer"
                    title="Visitar Bloomin - Desenvolvimento Web"
                    class="hover:opacity-80 transition-opacity">
                    <img src="./src/assets/images/logo/logo-bloomin.webp"
                        alt="Bloomin - Desenvolvimento Web"
                        class="h-12 w-auto object-contain">
                </a>
            </div>
        </div>
        <!-- Linha separada para links legais -->
        <div class="flex justify-center mt-4">
            <div class="flex items-center space-x-4 text-sm text-gray-400">
                <a href="./politica-de-privacidade" title="Ler Política de Privacidade" class="hover:text-white transition-colors">Política de Privacidade</a>
                <div class="w-px h-4 bg-white/20"></div>
                <a href="./mapa-do-site" title="Ver Mapa do Site" class="hover:text-white transition-colors">Mapa do Site</a>
            </div>
        </div>
    </div>
</footer>