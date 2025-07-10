<?php
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<div id="scroll-to-top" class="scroll-to-top-float opacity-0 pointer-events-none transition-all duration-300 ease-in-out" <?= $attrs ?>>
    <button
        id="scroll-to-top-btn"
        class="relative w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full shadow-lg hover:shadow-xl transition-all duration-300 group overflow-visible flex items-center justify-center"
        title="Voltar ao topo"
        aria-label="Voltar ao topo da página"
        type="button">
        <!-- Borda progressiva SVG -->
        <span id="scroll-progress-border" class="absolute inset-0 w-full h-full flex items-center justify-center pointer-events-none z-10">
            <svg width="48" height="48" viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="21" fill="none" stroke="#c3dafe" stroke-width="3" opacity="1" />
                <circle id="scroll-progress-circle" cx="24" cy="24" r="21" fill="none" stroke="#003366" stroke-width="3" stroke-linecap="round" stroke-dasharray="132" stroke-dashoffset="132" />
            </svg>
        </span>
        <!-- Ícone -->
        <span class="relative z-20 flex items-center justify-center w-full h-full">
            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
            </svg>
        </span>
    </button>
</div>