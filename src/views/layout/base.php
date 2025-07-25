<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="author" content="<?= $siteConfig['site_name'] ?>">
    <meta name="theme-color" content="#1f2937">

    <title><?= $this->e($title ?? $siteConfig['site_name']) ?></title>
    <meta name="description" content="<?= $this->e($description ?? $siteConfig['site_name']) ?>">
    <meta name="keywords" content="<?= $this->e($keywords ?? '') ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= $siteConfig['site_name'] ?>">
    <meta property="og:url" content="<?= $this->e($canonical ?? $siteConfig['url'] . $_SERVER['REQUEST_URI']) ?>">
    <meta property="og:title" content="<?= $this->e($ogTitle ?? $title ?? $siteConfig['site_name']) ?>">
    <meta property="og:description" content="<?= $this->e($ogDescription ?? $description ?? $siteConfig['site_name']) ?>">
    <meta property="og:image" content="<?= $this->e($ogImage ?? '') ?>">

    <link rel="canonical" href="<?= $this->e($canonical ?? $siteConfig['url'] . $_SERVER['REQUEST_URI']) ?>">

    <!-- Schema.org Structured Data -->
    <?php if (isset($schema)): ?>
        <script type="application/ld+json">
            <?= $schema ?>
        </script>
    <?php endif; ?>

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

    <?= $this->insert('components/ui/scroll-to-top') ?>

    <?= $this->insert('components/ui/privacy-popup') ?>

    <?php if ($siteConfig['gtm']): ?>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $siteConfig['gtm'] ?>"
                height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php endif; ?>
</body>

</html>