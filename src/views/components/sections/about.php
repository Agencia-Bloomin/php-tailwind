<?php
$title = 'Inovação em Soldagem: Precisão e Versatilidade';
$description = 'A Template PHP Bloomin pensa no futuro e inova hoje, fornecendo aos seus clientes tecnologia de ponta no processo de soldagem a laser e muito mais.';
$companyImage = $companyImage ?? [
    'src' => 'src/assets/images/local.webp',
    'alt' => 'Template PHP Bloomin - Empresa de Soldagem a Laser',
    'caption' => 'Nossa equipe e infraestrutura de alta tecnologia'
];
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<section class="relative py-24 bg-gradient-to-br from-slate-900 via-slate-800 to-blue-900 overflow-hidden" <?= $attrs ?>>
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary opacity-8 rounded-full mix-blend-screen filter blur-3xl translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary opacity-8 rounded-full mix-blend-screen filter blur-3xl -translate-x-1/2 translate-y-1/2"></div>
        <div class="absolute top-1/3 left-1/4 w-32 h-32 bg-primary opacity-6 rounded-full mix-blend-screen filter blur-2xl"></div>
        <div class="absolute bottom-1/4 right-1/3 w-48 h-48 bg-primary opacity-5 rounded-full mix-blend-screen filter blur-3xl"></div>
    </div>

    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <div class="relative group">
                <div class="rounded-2xl overflow-hidden shadow-2xl transition-all duration-300 group-hover:shadow-2xl group-hover:-translate-y-2 border border-white/10">
                    <img
                        src="<?= $this->e($companyImage['src']) ?>"
                        alt="<?= $this->e($companyImage['alt']) ?>"
                        title="<?= $this->e($companyImage['alt']) ?>"
                        class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent rounded-2xl"></div>
                </div>
                <?php if (!empty($companyImage['caption'])): ?>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent text-white p-6 text-center rounded-2xl">
                        <p class="text-sm font-medium backdrop-blur-sm"><?= $this->e($companyImage['caption']) ?></p>
                    </div>
                <?php endif; ?>

                <div class="absolute -top-4 -left-4 w-full h-full border-2 border-primary/30 rounded-2xl -z-10"></div>
            </div>

            <div class="space-y-8 lg:pl-8">
                <div class="space-y-6">
                    <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/10 backdrop-blur-sm text-white text-sm font-medium border border-white/20">
                        <span class="iconify w-4 h-4 mr-2 text-white" data-icon="heroicons:bolt"></span>
                        Engenharia de Precisão
                    </div>

                    <h2 class="text-3xl md:text-4xl font-bold text-white tracking-tight drop-shadow-lg">
                        Precisão e versatilidade em soldagem de alta performance
                    </h2>

                    <p class="text-lg text-neutral-200 leading-relaxed drop-shadow-sm">
                        Na Irenotecsol, unimos inovação, precisão milimétrica e tecnologia de ponta para atender as demandas mais exigentes da indústria. Realizamos soldagem a laser com máxima eficiência, além de oferecer processos complementares para diversos tipos de materiais e aplicações.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/20">
                        <div class="flex items-center space-x-3">
                            <span class="iconify w-6 h-6 text-white" data-icon="heroicons:cpu-chip"></span>
                            <div>
                                <h3 class="text-white font-semibold">Tecnologia Laser</h3>
                                <p class="text-neutral-300 text-sm">Precisão milimétrica</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/20">
                        <div class="flex items-center space-x-3">
                            <span class="iconify w-6 h-6 text-white" data-icon="heroicons:shield-check"></span>
                            <div>
                                <h3 class="text-white font-semibold">Qualidade Garantida</h3>
                                <p class="text-neutral-300 text-sm">ISO certificado</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-6 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <?= $this->insert('components/ui/button', [
                        'text' => 'Conheça Nossos Processos',
                        'href' => './servicos',
                        'variant' => 'primary',
                        'size' => 'lg',
                        'attributes' => [
                            'class' => 'group flex items-center justify-center space-x-2 shadow-xl hover:shadow-2xl transition-all duration-300 border-1 border-white/30'
                        ]
                    ]) ?>

                    <?= $this->insert('components/ui/button', [
                        'text' => 'Fale com Ireno e Douglas',
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
</section>