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
            ['text' => 'Sobre Nós', 'href' => '#', 'icon' => 'mdi:laser-pointer'],
            ['text' => 'Serviços', 'href' => '#', 'icon' => 'mdi:laser-pointer'],
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

<footer class="bg-gradient-to-br from-primary to-primary2 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#FFFFFF" fill-opacity="0.1" d="M0,160L48,176C96,192,192,224,288,229.3C384,235,480,213,576,186.7C672,160,768,128,864,133.3C960,139,1056,181,1152,197.3C1248,213,1344,203,1392,197.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row justify-between gap-10">
            <div class="space-y-6 lg:mx-auto max-w-md">
                <div class="flex items-center space-x-4">
                    <span class="iconify w-12 h-12 text-white" data-icon="mdi:laser-pointer"></span>
                    <h3 class="text-3xl font-bold text-white tracking-tight">
                        <?= $this->e($companyName) ?>
                    </h3>
                </div>
                <p class="text-gray-300 leading-relaxed">Especialistas em soluções de alta precisão para aplicações industriais. Transformamos desafios técnicos em inovações confiáveis, com foco em desempenho, durabilidade e excelência nos resultados.</p>
                <?php if (!empty($socialLinks)): ?>
                    <div class="flex space-x-4">
                        <?php foreach ($socialLinks as $social): ?>
                            <a href="<?= $this->e($social['href']) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                title="Siga-nos no <?= ucfirst(str_replace('mdi:', '', $social['icon'])) ?>"
                                class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center text-white hover:bg-white/20 transition-all duration-300 transform hover:scale-110">
                                <span class="iconify w-6 h-6" data-icon="<?= $this->e($social['icon']) ?>"></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php foreach ($footerLinks as $section): ?>
                <div class="space-y-6 lg:mx-auto max-w-md">
                    <h3 class="text-xl font-semibold text-white flex items-center space-x-3">
                        <span class="iconify w-6 h-6 text-white/70" data-icon="<?= $this->e($section['icon']) ?>"></span>
                        <span><?= $this->e($section['title']) ?></span>
                    </h3>
                    <ul class="space-y-3">
                        <?php foreach ($section['links'] as $link): ?>
                            <li>
                                <a href="<?= $this->e($link['href']) ?>"
                                    title="Ir para <?= $this->e($link['text']) ?>"
                                    class="text-gray-300 hover:text-white transition-all duration-300 flex items-center space-x-3 group">
                                    <span class="iconify w-5 h-5 opacity-50 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                                        data-icon="<?= $this->e($link['icon']) ?>"></span>
                                    <span><?= $this->e($link['text']) ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>

            <?php
            $hasContactInfo = !empty($siteConfig['phone']['number']) ||
                !empty($siteConfig['whatsapp']['number']) ||
                !empty($siteConfig['email']['primary']) ||
                !empty($siteConfig['address']['full']);
            ?>
            <?php if ($hasContactInfo): ?>
                <div class="space-y-6 lg:mx-auto max-w-md">
                    <h3 class="text-xl font-semibold text-white flex items-center space-x-3">
                        <span class="iconify w-6 h-6 text-white/70" data-icon="hugeicons:contact-01"></span>
                        <span>Contato</span>
                    </h3>
                    <ul class="space-y-3">
                        <?php if (!empty($siteConfig['phone']['number'])): ?>
                            <li>
                                <a href="tel:<?= $this->e($siteConfig['phone']['number']) ?>"
                                    title="Ligar para <?= $this->e($siteConfig['phone']['display']) ?>"
                                    class="text-gray-300 hover:text-white transition-all duration-300 flex items-center space-x-3 group">
                                    <span class="iconify w-5 h-5 opacity-50 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                                        data-icon="mdi:phone"></span>
                                    <span><?= $this->e($siteConfig['phone']['display']) ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($siteConfig['whatsapp']['number'])): ?>
                            <li>
                                <a href="https://wa.me/<?= $this->e($siteConfig['whatsapp']['number']) ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    title="Conversar no WhatsApp com <?= $this->e($siteConfig['whatsapp']['display']) ?>"
                                    class="text-gray-300 hover:text-white transition-all duration-300 flex items-center space-x-3 group">
                                    <span class="iconify w-5 h-5 opacity-50 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                                        data-icon="mdi:whatsapp"></span>
                                    <span><?= $this->e($siteConfig['whatsapp']['display']) ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($siteConfig['email']['primary'])): ?>
                            <li>
                                <a href="mailto:<?= $this->e($siteConfig['email']['primary']) ?>"
                                    title="Enviar email para <?= $this->e($siteConfig['email']['primary']) ?>"
                                    class="text-gray-300 hover:text-white transition-all duration-300 flex items-center space-x-3 group">
                                    <span class="iconify w-5 h-5 opacity-50 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                                        data-icon="mdi:email"></span>
                                    <span><?= $this->e($siteConfig['email']['primary']) ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($siteConfig['address']['full'])): ?>
                            <li>
                                <a href="https://maps.google.com/?q=<?= urlencode($siteConfig['address']['full']) ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    title="Ver localização no Google Maps"
                                    class="text-gray-300 hover:text-white transition-all duration-300 flex items-center space-x-3 group">
                                    <span class="iconify w-9 h-9 opacity-50 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                                        data-icon="weui:location-filled"></span>
                                    <span><?= $this->e($siteConfig['address']['full']) ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <hr class="border-t border-white/20 my-12">

        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div class="flex items-center space-x-3 text-gray-300">
                <span class="iconify w-5 h-5" data-icon="mdi:copyright"></span>
                <p>&copy; <?= $year ?> <?= $this->e($companyName) ?>. Todos os direitos reservados.</p>
            </div>
            <div class="flex items-center space-x-4 text-sm text-gray-400">
                <a href="./politica-de-privacidade" title="Ler Política de Privacidade" class="hover:text-white transition-colors">Política de Privacidade</a>
                <div class="w-px h-4 bg-white/20"></div>
                <a href="./mapa-do-site" title="Ver Mapa do Site" class="hover:text-white transition-colors">Mapa do Site</a>
            </div>
        </div>
    </div>
</footer>