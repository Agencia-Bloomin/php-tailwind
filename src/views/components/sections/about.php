<?php
$companyImage = $companyImage ?? [
    'src' => 'src/assets/images/about.jpg',
    'alt' => 'Banner institucional',
    'caption' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
];
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}

// Conteúdo das abas
$tabs = [
    'missao' => [
        'label' => 'Missão',
        'icon' => 'heroicons:flag',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.'
    ],
    'visao' => [
        'label' => 'Visão',
        'icon' => 'heroicons:eye',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.'
    ],
    'valores' => [
        'label' => 'Valores',
        'icon' => 'heroicons:star',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.'
    ]
];
?>

<section class="relative py-24 <?= $isSobrePage ? 'bg-white' : 'bg-gradient-to-br from-primary to-primary2' ?> overflow-hidden" <?= $attrs ?>>
    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative group">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white/10 bg-white/5 relative">
                    <img
                        src="<?= $this->e($companyImage['src']) ?>"
                        alt="<?= $this->e($companyImage['alt']) ?>"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <?php if (!empty($companyImage['caption'])): ?>
                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-[90%] text-center z-10">
                            <span class="inline-block bg-white/70 text-primary3 text-base font-semibold rounded-full px-6 py-2 shadow-md backdrop-blur-sm">
                                <?= $this->e($companyImage['caption']) ?>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="space-y-10 lg:pl-8">
                <div class="mb-8">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4 drop-shadow-lg">
                        Sobre a Bloomin
                    </h2>
                    <p class="text-lg text-white/80 leading-relaxed drop-shadow-sm max-w-2xl">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque euismod, urna eu tincidunt consectetur, nisi nisl aliquam nunc, eget aliquam nisl nisi euismod nunc.
                    </p>
                </div>

                <!-- Tabs Missão, Visão, Valores -->
                <div>
                    <div class="flex space-x-2 mb-6" id="about-tabs">
                        <?php foreach ($tabs as $key => $tab): ?>
                            <button type="button" class="about-tab px-6 py-3 rounded-full font-semibold flex items-center gap-2 bg-white/10 text-white hover:bg-primary/80 active:bg-primary active:text-white focus:bg-primary focus:text-white transition-all focus:outline-none" data-tab="<?= $key ?>">
                                <span class="iconify w-5 h-5" data-icon="<?= $tab['icon'] ?>"></span>
                                <?= $tab['label'] ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                    <div class="bg-white/10 rounded-2xl p-6 min-h-[120px] text-white text-lg shadow-inner" id="about-tab-content">
                        <?= $tabs['missao']['content'] ?>
                    </div>
                </div>

                <div class="pt-6 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <?= $this->insert('components/ui/button', [
                        'text' => 'Conheça nossa Empresa',
                        'href' => './sobre',
                        'variant' => 'primary',
                        'size' => 'lg',
                        'attributes' => [
                            'class' => 'group flex items-center justify-center space-x-2 shadow-xl hover:shadow-2xl transition-all duration-300 border-1 border-white/30'
                        ]
                    ]) ?>
                    <?= $this->insert('components/ui/button', [
                        'text' => 'Entre em Contato',
                        'href' => './contato',
                        'variant' => 'outline',
                        'size' => 'lg',
                        'attributes' => [
                            'class' => 'group flex items-center justify-center space-x-2 bg-white/10 backdrop-blur-sm border-white/30 text-white hover:bg-white/20 transition-all duration-300'
                        ]
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.about-tab');
            const content = document.getElementById('about-tab-content');
            const tabContents = {
                'missao': <?= json_encode($tabs['missao']['content']) ?>,
                'visao': <?= json_encode($tabs['visao']['content']) ?>,
                'valores': <?= json_encode($tabs['valores']['content']) ?>
            };
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(t => t.classList.remove('bg-primary', 'text-white', 'shadow-lg'));
                    this.classList.add('bg-primary', 'text-white', 'shadow-lg');
                    const key = this.getAttribute('data-tab');
                    content.innerHTML = tabContents[key];
                });
            });
            // Ativar a primeira aba por padrão
            if (tabs.length) tabs[0].classList.add('bg-primary', 'text-white', 'shadow-lg');
        });
    </script>
</section>