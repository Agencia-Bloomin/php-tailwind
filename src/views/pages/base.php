<?php
$siteConfig = require __DIR__ . '/../../config/site.php';
$seoConfig = require __DIR__ . '/../../config/seo.php';
?>
<!DOCTYPE html>
<html lang="<?= $seoConfig['global']['language'] ?>">

<head>
    <meta charset="<?= $seoConfig['global']['charset'] ?>">
    <meta name="viewport" content="<?= $seoConfig['global']['viewport'] ?>">
    <meta name="robots" content="<?= $seoConfig['global']['robots'] ?>">
    <meta name="author" content="<?= $seoConfig['global']['author'] ?>">
    <meta name="theme-color" content="<?= $seoConfig['global']['theme_color'] ?>">

    <title><?= $this->e($title ?? $seoConfig['global']['site_name']) ?></title>
    <meta name="description" content="<?= $this->e($description ?? $seoConfig['global']['site_description']) ?>">
    <meta name="keywords" content="<?= $this->e($keywords ?? $seoConfig['global']['site_description']) ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= $seoConfig['global']['site_name'] ?>">
    <meta property="og:url" content="<?= $this->e($canonical ?? 'https://seusite.com' . $_SERVER['REQUEST_URI']) ?>">
    <meta property="og:title" content="<?= $this->e($ogTitle ?? $title ?? $seoConfig['global']['site_name']) ?>">
    <meta property="og:description" content="<?= $this->e($ogDescription ?? $description ?? $seoConfig['global']['site_description']) ?>">
    <meta property="og:image" content="<?= $this->e($ogImage ?? 'https://seusite.com' . $seoConfig['home']['og_image']) ?>">

    <!-- Twitter Card -->
    <meta property="twitter:card" content="<?= $seoConfig['global']['twitter_card'] ?>">
    <meta property="twitter:site" content="<?= $seoConfig['global']['twitter_site'] ?>">
    <meta property="twitter:creator" content="<?= $seoConfig['global']['twitter_creator'] ?>">
    <meta property="twitter:url" content="<?= $this->e($canonical ?? 'https://seusite.com' . $_SERVER['REQUEST_URI']) ?>">
    <meta property="twitter:title" content="<?= $this->e($ogTitle ?? $title ?? $seoConfig['global']['site_name']) ?>">
    <meta property="twitter:description" content="<?= $this->e($ogDescription ?? $description ?? $seoConfig['global']['site_description']) ?>">
    <meta property="twitter:image" content="<?= $this->e($ogImage ?? 'https://seusite.com' . $seoConfig['home']['og_image']) ?>">

    <link rel="canonical" href="<?= $this->e($canonical ?? 'https://seusite.com' . $_SERVER['REQUEST_URI']) ?>">

    <?php if ($siteConfig['gtm']): ?>
        <script>
            function loadGTM() {
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var gtmScript = document.createElement('script');
                gtmScript.async = true;
                gtmScript.src = 'https://www.googletagmanager.com/gtm.js?id=<?= $siteConfig['gtm'] ?>';
                document.getElementsByTagName('head')[0].appendChild(gtmScript);
            }

            function checkUserActivity() {
                document.removeEventListener('mousemove', checkUserActivity);
                document.removeEventListener('keydown', checkUserActivity);
                document.removeEventListener('scroll', checkUserActivity);
                loadGTM();
            }

            document.addEventListener('mousemove', checkUserActivity, {
                once: true
            });
            document.addEventListener('keydown', checkUserActivity, {
                once: true
            });
            document.addEventListener('scroll', checkUserActivity, {
                once: true
            });
        </script>
    <?php endif; ?>

    <?php
    $assetsDir = 'public/assets';
    $buildJsFiles = glob($assetsDir . '/main-*.js');
    $isDev = empty($buildJsFiles);
    ?>

    <?php if ($isDev): ?>
        <link rel="stylesheet" href="/assets/style.css">
        <script type="module" src="http://localhost:5173/@vite/client"></script>
        <script type="module" src="http://localhost:5173/assets/js/main.js"></script>
    <?php else: ?>
        <?php foreach (glob($assetsDir . '/main-*.css') as $css): ?>
            <link rel="stylesheet" href="<?= $assetsDir ?>/<?= basename($css) ?>">
        <?php endforeach; ?>
        <?php foreach (glob($assetsDir . '/main-*.js') as $js): ?>
            <script type="module" src="<?= $assetsDir ?>/<?= basename($js) ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
    <?= $this->insert('components/layout/header') ?>

    <main class="min-h-[30vh] mt-[80px]">
        <?= $this->section('main_content') ?>
    </main>

    <?= $this->insert('components/layout/footer') ?>

    <?= $this->insert('components/ui/whatsapp-float') ?>

    <?= $this->insert('components/ui/privacy-popup') ?>

    <?php if ($siteConfig['gtm']): ?>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $siteConfig['gtm'] ?>"
                height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php endif; ?>
</body>

</html>