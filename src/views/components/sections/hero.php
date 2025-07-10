<?php
// Recebe o título dinâmico do SEO (deve ser passado pelo controller/layout)
$heroTitle = $heroTitle ?? ($seoConfig['home']['title'] ?? 'Título do Site');
$heroSubtitle = $heroSubtitle ?? ($seoConfig['home']['description'] ?? 'Subtítulo do site');
$breadcrumb = $breadcrumb ?? [];
$image = $image ?? 'src/assets/images/about.jpg';

// Breadcrumb condicional
function renderBreadcrumb($breadcrumb)
{
    if (empty($breadcrumb)) return '';
    $html = '<nav class="mb-6" aria-label="Breadcrumb"><ol class="flex items-center space-x-2 text-sm text-primary2">';
    foreach ($breadcrumb as $i => $item) {
        if ($i > 0) $html .= '<li><span class="mx-2">&gt;</span></li>';
        if (!empty($item['href'])) {
            $html .= '<li><a href="' . htmlspecialchars($item['href']) . '" class="hover:underline">' . htmlspecialchars($item['label']) . '</a></li>';
        } else {
            $html .= '<li class="font-semibold text-primary">' . htmlspecialchars($item['label']) . '</li>';
        }
    }
    $html .= '</ol></nav>';
    return $html;
}
?>

<section id="hero" class="relative overflow-hidden bg-gradient-to-br from-primary/90 to-primary2/80 py-20 md:py-32 text-white">
    <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center gap-12">
        <div class="flex-1 flex flex-col justify-center z-10">
            <?= renderBreadcrumb($breadcrumb) ?>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-6 drop-shadow-xl" data-animate="fade-in-up">
                <?= htmlspecialchars_decode($heroTitle) ?>
            </h1>
            <p class="text-lg md:text-2xl text-primary4 mb-8 max-w-2xl drop-shadow-lg" data-animate="fade-in-up">
                <?= htmlspecialchars_decode($heroSubtitle) ?>
            </p>
            <div class="flex flex-wrap gap-4 mb-10" data-animate="stagger-children">
                <a href="#servicos" class="px-8 py-3 rounded-full bg-white text-primary font-bold shadow-lg hover:bg-primary hover:text-white transition-all duration-300" data-animate-child>Ver Serviços</a>
                <a href="#contato" class="px-8 py-3 rounded-full border-2 border-white text-white font-bold shadow-lg hover:bg-white hover:text-primary transition-all duration-300" data-animate-child>Solicitar Orçamento</a>
            </div>
        </div>
        <div class="flex-1 flex justify-center items-center relative z-0">
            <div class="relative w-full max-w-lg aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl border-4 border-white/20 bg-white/10">
                <img src="<?= $this->e($image) ?>" alt="Banner institucional" class="w-full h-full object-cover" loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent"></div>
            </div>
            <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-primary2 opacity-30 rounded-full blur-3xl z-0"></div>
        </div>
    </div>
</section>