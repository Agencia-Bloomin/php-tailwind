<?php
$siteConfig = require dirname(__DIR__, 3) . '/config/site.php';
$logo = $logo ?? [
    'text' => 'Itecsoldas',
    'href' => './'
];
$menuItems = $menuItems ?? [
    [
        'text' => 'Início',
        'href' => './',
        'active' => $_SERVER['REQUEST_URI'] === '/'
    ],
    [
        'text' => 'Sobre Nós',
        'href' => '#',
        'active' => $_SERVER['REQUEST_URI'] === '#'
    ],
    [
        'text' => 'Serviços',
        'href' => '#',
        'active' => $_SERVER['REQUEST_URI'] === './servicos',
        'submenu' => [
            [
                'text' => 'Peças Soldadas a Laser',
                'href' => '#'
            ],
            [
                'text' => 'Soldagem a Laser',
                'href' => '#'
            ],
            [
                'text' => 'Laser',
                'href' => '#'
            ],
            [
                'text' => 'Peças Laser',
                'href' => '#'
            ],
            [
                'text' => 'Solda Mig/Mag',
                'href' => '#'
            ],
            [
                'text' => 'Bancadas',
                'href' => '#'
            ],
            [
                'text' => 'Eletrodo Revestido',
                'href' => '#'
            ],
            [
                'text' => 'Brasagem',
                'href' => '#'
            ],
            [
                'text' => 'Soldagem de Punções',
                'href' => '#'
            ],
            [
                'text' => 'Matrizes para Corte Quente e Frio ',
                'href' => '#'
            ],
            [
                'text' => 'Transporte de Peças ',
                'href' => '#'
            ],
        ]
    ],
    [
        'text' => 'Equipamentos ',
        'href' => '#',
        'active' => $_SERVER['REQUEST_URI'] === '#'
    ],
    [
        'text' => 'Contato',
        'href' => './contato',
        'active' => $_SERVER['REQUEST_URI'] === './contato'
    ]
];
$ctaButton = $ctaButton ?? [
    'text' => 'Solicitar Orçamento',
    'href' => './contato',
    'variant' => 'primary',
    'size' => 'md'
];
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<header class="fixed top-0 left-0 right-0 z-50 h-[80px] bg-white/90 backdrop-blur-lg border-b border-neutral-200 shadow-sm" <?= $attrs ?>>
    <div class="container mx-auto px-4 max-w-screen-xl">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-4">
                <a href="<?= htmlspecialchars($logo['href']) ?>" class="flex items-center space-x-3 group">
                    <span class="iconify w-10 h-10 text-primary transition-transform duration-300 group-hover:scale-110" data-icon="heroicons:cog-6-tooth"></span>
                    <span class="text-2xl font-bold text-primary tracking-tight">
                        <?= htmlspecialchars($logo['text']) ?>
                    </span>
                </a>
            </div>

            <nav class="hidden lg:flex items-center space-x-8">
                <?php foreach ($menuItems as $item): ?>
                    <div class="relative group">
                        <a href="<?= htmlspecialchars($item['href']) ?>"
                            class="relative text-neutral-600 hover:text-primary transition-colors duration-200 py-2 group-hover:text-primary flex items-center gap-1">
                            <?= htmlspecialchars($item['text']) ?>
                            <?php if (isset($item['submenu']) && !empty($item['submenu'])): ?>
                                <span class="iconify w-4 h-4 transition-all duration-300 ease-in-out group-hover:rotate-180" data-icon="heroicons:chevron-down"></span>
                            <?php endif; ?>
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                            <?php if (isset($item['active']) && $item['active']): ?>
                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary"></span>
                            <?php endif; ?>
                        </a>

                        <?php if (isset($item['submenu']) && !empty($item['submenu'])): ?>
                            <div class="absolute hidden group-hover:block top-full left-0 min-w-[300px] bg-white shadow-lg rounded-lg border border-neutral-200 mt-2 py-2 z-50 max-h-[350px] overflow-y-auto">
                                <?php foreach ($item['submenu'] as $subitem): ?>
                                    <a href="<?= htmlspecialchars($subitem['href']) ?>"
                                        class="block px-4 py-2 text-neutral-600 hover:bg-neutral-50 hover:text-primary transition-colors duration-200">
                                        <?= htmlspecialchars($subitem['text']) ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </nav>

            <div class="hidden lg:flex items-center space-x-4">
                <?= $this->insert('components/ui/button', [
                    'text' => $ctaButton['text'],
                    'href' => $ctaButton['href'],
                    'variant' => $ctaButton['variant'],
                    'attributes' => [
                        'class' => 'group flex items-center space-x-2'
                    ]
                ]) ?>
            </div>

            <div class="lg:hidden">
                <button id="mobile-menu-toggle" class="text-neutral-600 hover:text-primary focus:outline-none transition-colors duration-200"
                    aria-label="Menu">
                    <span class="iconify w-6 h-6" data-icon="heroicons:bars-3"></span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden">
            <nav class="py-6 space-y-4 bg-white shadow-lg rounded-lg">
                <?php foreach ($menuItems as $item): ?>
                    <div>
                        <?php if (isset($item['submenu']) && !empty($item['submenu'])): ?>
                            <button class="w-full px-4 text-neutral-700 hover:text-primary hover:bg-neutral-50 transition-colors duration-200 py-3 flex justify-between items-center mobile-dropdown-toggle">
                                <?= htmlspecialchars($item['text']) ?>
                                <span class="iconify transition-transform duration-200" data-icon="heroicons:chevron-down"></span>
                            </button>
                            <div class="mobile-dropdown hidden pl-4 space-y-2 mt-2 max-h-[350px] overflow-y-auto">
                                <?php foreach ($item['submenu'] as $subitem): ?>
                                    <a href="<?= htmlspecialchars($subitem['href']) ?>"
                                        class="block px-4 text-neutral-600 hover:text-primary hover:bg-neutral-50 transition-colors duration-200 py-2">
                                        <?= htmlspecialchars($subitem['text']) ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <a href="<?= htmlspecialchars($item['href']) ?>"
                                class="block px-4 text-neutral-700 hover:text-primary hover:bg-neutral-50 transition-colors duration-200 py-3">
                                <?= htmlspecialchars($item['text']) ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <div class="px-4 pt-4">
                    <?= $this->insert('components/ui/button', [
                        'text' => $ctaButton['text'],
                        'href' => $ctaButton['href'],
                        'variant' => $ctaButton['variant'],
                        'attributes' => [
                            'class' => 'w-full justify-center group flex items-center space-x-2'
                        ]
                    ]) ?>
                </div>
            </nav>
        </div>
    </div>
</header>