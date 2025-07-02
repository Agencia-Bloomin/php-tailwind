<?php
$sectionTitle = 'Serviços Especializados em Soldagem a Laser e Fabricação';
$sectionSubtitle = 'Precisão Milimétrica em Cada Solução';
$sectionDescription = 'Oferecemos soluções avançadas de soldagem a laser e fabricação especializada para diversos setores industriais, com foco em precisão, qualidade e inovação.';

$services = [
    [
        'title' => 'Soldagem a Laser de Precisão',
        'icon' => 'heroicons:cpu-chip',
        'description' => 'Tecnologia de ponta para soldas precisas em peças industriais, com resolução milimétrica e mínima zona termicamente afetada.',
        'features' => [
            'Precisão micrométrica',
            'Compatível com múltiplos materiais',
            'Mínima deformação térmica'
        ],
        'image' => 'src/assets/images/soldagem.jpg',
    ],
    [
        'title' => 'Soldagem a Laser para Ferramentaria',
        'icon' => 'heroicons:wrench-screwdriver',
        'description' => 'Serviço especializado de soldagem a laser para recuperação e fabricação de ferramentas, moldes e matrizes.',
        'features' => [
            'Recuperação de ferramentas',
            'Reparo de moldes',
            'Precisão dimensional garantida'
        ],
        'image' => 'src/assets/images/soldagem-laser.jpg',
    ],
    [
        'title' => 'Fabricação de Peças a Laser',
        'icon' => 'heroicons:cube-transparent',
        'description' => 'Produção de peças complexas e precisas utilizando tecnologia de soldagem a laser de última geração.',
        'features' => [
            'Peças com alta complexidade',
            'Acabamento superficial superior',
            'Tolerâncias extremamente apertadas'
        ],
        'image' => 'src/assets/images/pecas-laser.jpg',
    ],
    [
        'title' => 'Bancadas para Ferramentaria',
        'icon' => 'heroicons:rectangle-stack',
        'description' => 'Desenvolvimento de bancadas especializadas para processos de ferramentaria, com foco em precisão e funcionalidade.',
        'features' => [
            'Abertura de moldes',
            'Suporte para processos industriais',
            'Customização sob medida'
        ],
        'image' => 'src/assets/images/bancada.webp',
    ],
    [
        'title' => 'Soldagem MIG/MAG Especializada',
        'icon' => 'heroicons:fire',
        'description' => 'Processo versátil de soldagem para estruturas industriais e componentes que exigem alta resistência.',
        'features' => [
            'Alta velocidade de soldagem',
            'Excelente penetração',
            'Versatilidade em espessuras'
        ],
        'image' => 'src/assets/images/soldagem-mig-mag.jpg',
    ],
    [
        'title' => 'Serviços Laser Customizados',
        'icon' => 'heroicons:sparkles',
        'description' => 'Soluções personalizadas de soldagem e fabricação a laser para necessidades específicas de cada cliente.',
        'features' => [
            'Análise técnica personalizada',
            'Soluções sob medida',
            'Consultoria especializada'
        ],
        'image' => 'src/assets/images/laser-customizado.webp',
    ]
];

$ctaButton = [
    'text' => 'Solicitar Orçamento',
    'href' => './contato',
    'variant' => 'primary',
    'size' => 'lg'
];
?>

<section class="relative py-24 bg-gradient-to-br from-slate-900 via-slate-800 to-indigo-900 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary opacity-8 rounded-full mix-blend-screen filter blur-3xl translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary opacity-8 rounded-full mix-blend-screen filter blur-3xl -translate-x-1/2 translate-y-1/2"></div>
        <div class="absolute top-1/3 right-1/4 w-32 h-32 bg-primary opacity-6 rounded-full mix-blend-screen filter blur-2xl"></div>
    </div>

    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/10 backdrop-blur-sm text-white text-sm font-medium border border-white/20 mb-4">
                <span class="iconify w-4 h-4 mr-2 text-white" data-icon="heroicons:bolt"></span>
                Soluções Avançadas de Fabricação
            </div>
            
            <h2 class="text-4xl md:text-5xl font-bold text-white tracking-tight mb-6 drop-shadow-lg">
                <?= $sectionTitle ?>
            </h2>
            
            <p class="text-xl text-neutral-200 max-w-3xl mx-auto leading-relaxed drop-shadow-sm">
                <?= $sectionDescription ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($services as $service): ?>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl overflow-hidden border border-white/20 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                    <div class="relative overflow-hidden">
                        <img 
                            src="<?= $this->e($service['image']) ?>" 
                            alt="<?= $this->e($service['title']) ?>" 
                            class="w-full h-64 object-cover transform transition-transform duration-300 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        <div class="absolute top-4 left-4 bg-primary/90 text-white px-3 py-2 rounded-full shadow-lg">
                            <span class="iconify w-6 h-6" data-icon="<?= $this->e($service['icon']) ?>"></span>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-white mb-4 drop-shadow-sm">
                            <?= $this->e($service['title']) ?>
                        </h3>
                        
                        <p class="text-neutral-200 mb-6 leading-relaxed">
                            <?= $this->e($service['description']) ?>
                        </p>
                        
                        <ul class="space-y-3 mb-6">
                            <?php foreach ($service['features'] as $feature): ?>
                                <li class="flex items-center space-x-3 text-neutral-300">
                                    <span class="iconify w-5 h-5 text-white" data-icon="heroicons:check-circle"></span>
                                    <span><?= $this->e($feature) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-16">
            <div class="bg-white/10 backdrop-blur-sm p-10 rounded-3xl shadow-xl border border-white/20 max-w-3xl mx-auto mb-8">
                <div class="flex items-center justify-center space-x-3 mb-6">
                    <span class="iconify w-8 h-8 text-primary" data-icon="heroicons:lightbulb"></span>
                    <h3 class="text-2xl font-bold text-white">Precisa de uma Solução Personalizada?</h3>
                </div>
                <p class="text-neutral-200 mb-8 text-lg">Nossa equipe técnica está pronta para desenvolver soluções específicas para seu projeto industrial.</p>
            </div>
            
            <?= $this->insert('components/common/button', [
                'text' => $ctaButton['text'],
                'href' => $ctaButton['href'],
                'variant' => $ctaButton['variant'],
                'size' => $ctaButton['size'],
                'attributes' => [
                    'class' => 'group flex items-center justify-center space-x-2 mx-auto shadow-xl hover:shadow-2xl'
                ]
            ]) ?>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const serviceCards = document.querySelectorAll('.group');
    
    serviceCards.forEach(card => {
        const image = card.querySelector('img');
        
        card.addEventListener('mouseenter', function() {
            image.style.transform = 'scale(1.05)';
        });
        
        card.addEventListener('mouseleave', function() {
            image.style.transform = 'scale(1)';
        });
    });
});
</script>

<style>
.services-section {
    background: linear-gradient(
        135deg, 
        var(--color-neutral-50) 0%, 
        var(--color-neutral-100) 100%
    );
}
</style>
