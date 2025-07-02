<?php
$title = $title ?? 'Precisão Laser em Soldagem Industrial';
$subtitle = $subtitle ?? 'Tecnologia de alta performance para aplicações de alta exigência';
$description = $description ?? 'Transformando desafios em soluções de soldagem com tecnologia laser de última geração. Oferecemos precisão milimétrica e qualidade excepcional para os mais diversos setores industriais.';
$image = $image ?? 'src/assets/images/soldagem.jpg';
$features = $features ?? [
    [
        'icon' => 'heroicons:sparkles',
        'text' => 'Precisão Milimétrica'
    ],
    [
        'icon' => 'heroicons:cpu-chip',
        'text' => 'Laser de Última Geração'
    ],
    [
        'icon' => 'heroicons:shield-check',
        'text' => 'Controle de Qualidade Rigoroso'
    ]
];
$buttons = [
    [
        'text' => 'Nossos Serviços',
        'href' => './servicos',
        'variant' => 'primary'
    ],
    [
        'text' => 'Solicitar Orçamento',
        'href' => './contato',
        'variant' => 'outline'
    ]
];
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<section id="hero" class="relative overflow-hidden" <?= $attrs ?>>
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-24 pt-14 z-20">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="inline-flex items-center text-white px-4 py-2 rounded-full bg-primary bg-opacity-10 text-sm font-medium backdrop-blur-sm">
                        <span class="iconify w-4 h-4 mr-2" data-icon="heroicons:bolt"></span>
                        Especialistas em soldagem de precisão a laser
                    </div>

                    <div class="space-y-4">
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-neutral-900 tracking-tight drop-shadow-md">
                            <?= $title ?>
                        </h1>
                        <h2 class="text-1xl md:text-2xl font-semibold text-primary drop-shadow-sm">
                            <?= $subtitle ?>
                        </h2>
                    </div>

                    <p class="text-md text-neutral-700 leading-relaxed max-w-2xl drop-shadow-sm bg-white/30 backdrop-blur-sm p-4 rounded-lg">
                        <?= $description ?>
                    </p>

                    <ul class="space-y-4">
                        <?php foreach ($features as $feature): ?>
                            <li class="flex items-center space-x-3 text-neutral-700 group bg-white/20 backdrop-blur-sm p-3 rounded-lg">
                                <span class="iconify w-6 h-6 text-primary transition-all duration-300 group-hover:scale-110" data-icon="<?= $feature['icon'] ?>"></span>
                                <span class="text-md drop-shadow-sm font-medium"><?= $feature['text'] ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <?php foreach ($buttons as $button): ?>
                            <?= $this->insert('components/common/button', [
                                'text' => $button['text'],
                                'href' => $button['href'],
                                'variant' => $button['variant'],
                                'size' => 'lg',
                                'attributes' => [
                                    'class' => 'group flex items-center space-x-2 shadow-xl backdrop-blur-sm'
                                ]
                            ]) ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="grid grid-cols-3 gap-8 pt-8 border-t border-neutral-200/50 bg-white/40 backdrop-blur-sm p-6 rounded-xl">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary drop-shadow-sm">
                                <span id="counter-precision">0.0</span>mm
                            </div>
                            <div class="text-sm text-neutral-600">Precisão</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary drop-shadow-sm">
                                +<span id="counter-projects">0</span>
                            </div>
                            <div class="text-sm text-neutral-600">Projetos</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary drop-shadow-sm">
                                <span id="counter-sectors">0</span>+
                            </div>
                            <div class="text-sm text-neutral-600">Setores</div>
                        </div>
                    </div>

                </div>

                <div class="relative group">
                    <div class="relative z-10 overflow-hidden rounded-2xl shadow-2xl">
                        <img src="<?= $this->e($image) ?>"
                            alt="Processo de Soldagem a Laser Industrial"
                            loading="lazy"
                            decoding="async"
                            class="w-full h-auto object-cover transform transition-all duration-500 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>

                    <div class="absolute -bottom-4 -right-4 w-full h-full bg-primary opacity-10 rounded-2xl transform rotate-3 z-0"></div>

                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg z-20">
                        <div class="flex items-center space-x-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            <span class="text-sm font-medium text-neutral-800">Em Operação</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>