<?php
$services = $services ?? [
    [
        'title' => 'Soldagem a Laser',
        'description' => 'Alta precisão aplicada em ferramentaria, moldes e peças técnicas de diversos materiais.',
        'icon' => 'mdi:lightning-bolt',
    ],
    [
        'title' => 'Soldagem MIG',
        'description' => 'Ideal para estruturas industriais com alto desempenho em aplicações de média e alta complexidade.',
        'icon' => 'mdi:tools',
    ],
    [
        'title' => 'Soldagem TIG',
        'description' => 'Indicada para metais especiais, com acabamento refinado e elevada qualidade técnica.',
        'icon' => 'mdi:sine-wave',
    ],
    [
        'title' => 'Eletrodo Revestido',
        'description' => 'Versatilidade e robustez para estruturas metálicas que exigem resistência mecânica elevada.',
        'icon' => 'mdi:hammer',
    ],
    [
        'title' => 'Brasagem',
        'description' => 'União precisa de metais por meio de aquecimento controlado, sem fusão direta das peças base.',
        'icon' => 'mdi:fire',
    ],
    [
        'title' => 'Soldagem de Punções e Matrizes',
        'description' => 'Recondicionamento técnico para moldes e ferramentas de corte com alto padrão de exigência.',
        'icon' => 'mdi:cube-outline',
    ]
];

$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<section class="relative py-32 bg-gradient-to-br from-white via-neutral-50 to-primary/10 overflow-hidden" <?= $attrs ?>>


    <div class="absolute top-1/4 left-10 w-4 h-4 bg-primary/20 rounded-full animate-pulse"></div>
    <div class="absolute top-3/4 right-20 w-6 h-6 bg-primary/30 rounded-full animate-pulse delay-1000"></div>
    <div class="absolute bottom-1/3 left-1/4 w-2 h-2 bg-primary/40 rounded-full animate-pulse delay-500"></div>

    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white shadow-lg text-primary text-sm font-medium mb-6">
                <span class="iconify w-4 h-4 mr-2" data-icon="heroicons:wrench-screwdriver"></span>
                Soluções de Soldagem Industrial
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-white tracking-tight mb-6 drop-shadow-lg">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit
            </h2>
            <p class="text-xl text-primary4 max-w-3xl mx-auto leading-relaxed drop-shadow-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque euismod, urna eu tincidunt consectetur, nisi nisl aliquam nunc, eget aliquam nisl nisi euismod nunc.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mb-20">
            <?php foreach ($services as $index => $service): ?>
                <div class="group relative">
                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-white/50 backdrop-blur-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 relative h-full flex flex-col overflow-hidden">
                        <div class="absolute top-4 right-4 w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                            <span class="text-xs font-bold text-primary"><?= sprintf('%02d', $index + 1) ?></span>
                        </div>

                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center">
                                <span class="iconify w-7 h-7 text-primary transition-transform duration-300 group-hover:scale-110" data-icon="<?= $service['icon'] ?>"></span>
                            </div>
                            <h3 class="text-xl font-bold text-primary3 leading-tight"><?= $service['title'] ?></h3>
                        </div>

                        <p class="text-primary2 mb-8 leading-relaxed flex-grow">
                            <?= $service['description'] ?>
                        </p>

                        <div class="flex space-x-3 z-10">
                            <?= $this->insert('components/ui/button', [
                                'text' => 'Detalhes',
                                'href' => './servicos',
                                'variant' => 'outline',
                                'size' => 'sm',
                                'attributes' => [
                                    'class' => 'flex-1 text-center text-xs'
                                ]
                            ]) ?>
                            <?= $this->insert('components/ui/button', [
                                'text' => 'Cotação',
                                'href' => './contato',
                                'variant' => 'primary',
                                'size' => 'sm',
                                'attributes' => [
                                    'class' => 'flex-1 text-center text-xs'
                                ]
                            ]) ?>
                        </div>

                        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-primary/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center">
            <div class="bg-white/80 backdrop-blur-sm p-10 rounded-3xl shadow-xl border border-white/50 max-w-3xl mx-auto">
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