<?php
$services = $services ?? [
    [
        'title' => 'Soldagem a Laser',
        'description' => 'Alta precisão aplicada em ferramentaria, moldes e peças técnicas de diversos materiais.',
        'icon' => 'mdi:lightning-bolt',
        'image' => 'src/assets/images/about.jpg',
    ],
    [
        'title' => 'Soldagem MIG',
        'description' => 'Ideal para estruturas industriais com alto desempenho em aplicações de média e alta complexidade.',
        'icon' => 'mdi:tools',
        'image' => 'src/assets/images/about.jpg',
    ],
    [
        'title' => 'Soldagem TIG',
        'description' => 'Indicada para metais especiais, com acabamento refinado e elevada qualidade técnica.',
        'icon' => 'mdi:sine-wave',
        'image' => 'src/assets/images/about.jpg',
    ],
    [
        'title' => 'Eletrodo Revestido',
        'description' => 'Versatilidade e robustez para estruturas metálicas que exigem resistência mecânica elevada.',
        'icon' => 'mdi:hammer',
        'image' => 'src/assets/images/about.jpg',
    ],
    [
        'title' => 'Brasagem',
        'description' => 'União precisa de metais por meio de aquecimento controlado, sem fusão direta das peças base.',
        'icon' => 'mdi:fire',
        'image' => 'src/assets/images/about.jpg',
    ],
    [
        'title' => 'Soldagem de Punções e Matrizes',
        'description' => 'Recondicionamento técnico para moldes e ferramentas de corte com alto padrão de exigência.',
        'icon' => 'mdi:cube-outline',
        'image' => 'src/assets/images/about.jpg',
    ]
];

$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<section class="relative py-32 bg-white overflow-hidden" <?= $attrs ?>>
    <div class="absolute inset-0 pointer-events-none select-none">
        <div class="absolute top-0 left-0 w-1/2 h-1/2 bg-gradient-to-br from-primary/5 to-transparent rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-1/3 h-1/3 bg-gradient-to-tr from-primary2/10 to-transparent rounded-full blur-2xl"></div>
    </div>
    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-primary/10 text-primary text-sm font-medium mb-6">
                <span class="iconify w-5 h-5 mr-2" data-icon="heroicons:wrench-screwdriver"></span>
                Soluções de Soldagem Industrial
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-primary3 mb-4 drop-shadow-lg">
                Nossos Serviços
            </h2>
            <p class="text-xl text-primary2 max-w-3xl mx-auto leading-relaxed drop-shadow-sm">
                Conheça as soluções que oferecemos para sua indústria, com tecnologia de ponta e equipe especializada.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10 mb-20">
            <?php foreach ($services as $index => $service): ?>
                <div class="group relative" data-animate="fade-in-up">
                    <div class="bg-white rounded-3xl shadow-xl border border-primary/10 p-0 flex flex-col items-center text-center transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 hover:border-primary/30 overflow-hidden">
                        <div class="w-full h-44 bg-gray-100 overflow-hidden relative">
                            <img src="<?= $this->e($service['image']) ?>" alt="<?= $this->e($service['title']) ?>" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy" />
                            <span class="absolute top-3 left-3 bg-white/80 rounded-full p-2 shadow text-primary">
                                <span class="iconify text-2xl" data-icon="<?= $service['icon'] ?>"></span>
                            </span>
                        </div>
                        <div class="p-8 flex flex-col flex-1 w-full">
                            <h3 class="text-2xl font-bold text-primary3 mb-3">
                                <?= $service['title'] ?>
                            </h3>
                            <p class="text-primary2 mb-8 leading-relaxed flex-grow">
                                <?= $service['description'] ?>
                            </p>
                            <div class="flex flex-col sm:flex-row gap-3 w-full mt-auto">
                                <?= $this->insert('components/ui/button', [
                                    'text' => 'Saiba mais',
                                    'href' => './servicos',
                                    'variant' => 'outline',
                                    'size' => 'md',
                                    'attributes' => [
                                        'class' => 'flex-1 text-center font-semibold'
                                    ]
                                ]) ?>
                                <?= $this->insert('components/ui/button', [
                                    'text' => 'Orçamento',
                                    'href' => './contato',
                                    'variant' => 'primary',
                                    'size' => 'md',
                                    'attributes' => [
                                        'class' => 'flex-1 text-center font-semibold'
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center">
            <div class="bg-primary/5 p-10 rounded-3xl shadow-xl border border-primary/10 max-w-3xl mx-auto">
                <div class="flex items-center justify-center space-x-3 mb-6">
                    <span class="iconify w-8 h-8 text-primary" data-icon="heroicons:lightbulb"></span>
                    <h3 class="text-2xl font-bold text-primary3">Soluções Sob Medida para sua Indústria</h3>
                </div>
                <p class="text-primary2 mb-8 text-lg">Nossa equipe técnica está preparada para desenvolver projetos personalizados com foco em desempenho, durabilidade e agilidade na execução.</p>
                <?= $this->insert('components/ui/button', [
                    'text' => 'Fale com Nossos Especialistas',
                    'href' => './contato',
                    'variant' => 'primary',
                    'size' => 'lg',
                    'attributes' => [
                        'class' => 'group flex items-center justify-center space-x-2'
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</section>