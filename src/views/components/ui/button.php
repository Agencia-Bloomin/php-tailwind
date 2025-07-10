<?php
$text = $text ?? 'Button';
$href = $href ?? '#';
$variant = $variant ?? 'primary';
$size = $size ?? 'md';
$attributes = $attributes ?? [];
$type = $type ?? 'button';
$isLink = isset($href) && $href !== null;

$baseClasses = 'inline-flex items-center justify-center border rounded-md font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-300';

$variants = [
    'primary' => 'bg-primary text-white hover:bg-primary border-transparent focus:ring-primary shadow-md hover:shadow-lg hover:scale-105',
    'secondary' => 'bg-primary4 text-primary3 hover:bg-primary2 border-transparent focus:ring-primary4 shadow-sm hover:shadow-md',
    'outline' => 'bg-transparent text-primary hover:bg-primary hover:text-white border-primary focus:ring-primary hover:border-primary-dark transition-all duration-300'
];

$sizes = [
    'xs' => 'px-2 py-1 text-xs',
    'sm' => 'px-3 py-2 text-sm',
    'md' => 'px-4 py-2 text-sm',
    'lg' => 'px-6 py-3 text-base',
    'xl' => 'px-8 py-4 text-lg'
];

$classes = $baseClasses
    . ' ' . ($variants[$variant] ?? $variants['primary'])
    . ' ' . ($sizes[$size] ?? $sizes['md']);

if (isset($attributes['class'])) {
    $classes .= ' ' . trim($attributes['class']);
    unset($attributes['class']);
}

$attrString = '';
if (is_array($attributes)) {
    foreach ($attributes as $key => $value) {
        $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
    }
}
?>

<?php if ($isLink): ?>
    <a href="<?= htmlspecialchars($href) ?>" class="<?= $classes ?>" <?= $attrString ?>>
        <?= htmlspecialchars($text) ?>
    </a>
<?php else: ?>
    <button type="<?= htmlspecialchars($type) ?>" class="<?= $classes ?>" <?= $attrString ?>>
        <?= htmlspecialchars($text) ?>
    </button>
<?php endif; ?>