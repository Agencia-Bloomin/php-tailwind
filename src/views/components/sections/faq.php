<?php
$faq_items = [
    [
        'question' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.'
    ],
    [
        'question' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.'
    ],
    [
        'question' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.'
    ],
    [
        'question' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.'
    ]
];
?>

<section class="faq-section py-24 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="max-w-xl">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                        Perguntas Frequentes
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-primary to-primary2 bg-clip-text text-transparent tracking-tight mb-6 drop-shadow-lg">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    </h2>
                    <p class="text-xl text-primary2 max-w-3xl mx-auto leading-relaxed drop-shadow-sm">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque euismod, urna eu tincidunt consectetur, nisi nisl aliquam nunc, eget aliquam nisl nisi euismod nunc.
                    </p>
                    <div class="bg-white border border-neutral-200 rounded-2xl p-8 shadow-sm mt-10">
                        <h3 class="text-2xl font-bold text-primary3 mb-6">
                            Precisa de Ajuda Especializada?
                        </h3>
                        <p class="text-primary2 mb-8">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                        </p>
                        <?= $this->insert('components/ui/button', [
                            'text' => 'Consulta Técnica Gratuita',
                            'href' => './contato',
                            'variant' => 'primary',
                            'size' => 'lg'
                        ]) ?>
                    </div>
                </div>
            </div>

            <div class="space-y-6" id="faq-container">
                <?php foreach (
                    $faq_items as $index => $item
                ): ?>
                    <div class="faq-item bg-neutral-100 rounded-2xl border border-neutral-200 overflow-hidden">
                        <div class="faq-question flex items-center justify-between p-6 cursor-pointer hover:bg-neutral-200 transition-colors">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                    <span class="text-primary font-bold"><?= $index + 1 ?></span>
                                </div>
                                <h3 class="text-xl font-semibold text-primary3">
                                    <?= $item['question'] ?>
                                </h3>
                            </div>
                            <svg class="faq-toggle w-6 h-6 text-primary2 transform transition-transform<?= $index === 0 ? ' rotate-180' : '' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="faq-answer p-6 pt-0<?= $index === 0 ? '' : ' hidden' ?> text-neutral-600">
                            <?= $item['answer'] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>