<?php $siteConfig = require __DIR__ . '/../../config/site.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->e($title ?? 'SEO Template') ?></title>
    <meta name="description" content="<?= $this->e($description ?? 'Descrição padrão do site') ?>">
    <meta name="keywords" content="<?= $this->e($keywords ?? 'palavras-chave, seo, template') ?>">
    
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $this->e($ogUrl ?? 'https://seusite.com') ?>">
    <meta property="og:title" content="<?= $this->e($ogTitle ?? $title ?? 'SEO Template') ?>">
    <meta property="og:description" content="<?= $this->e($ogDescription ?? $description ?? 'Descrição padrão do site') ?>">
    <meta property="og:image" content="<?= $this->e($ogImage ?? 'https://seusite.com/images/default.jpg') ?>">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= $this->e($ogUrl ?? 'https://seusite.com') ?>">
    <meta property="twitter:title" content="<?= $this->e($ogTitle ?? $title ?? 'SEO Template') ?>">
    <meta property="twitter:description" content="<?= $this->e($ogDescription ?? $description ?? 'Descrição padrão do site') ?>">
    <meta property="twitter:image" content="<?= $this->e($ogImage ?? 'https://seusite.com/images/default.jpg') ?>">

    <link rel="canonical" href="<?= $this->e($canonicalUrl ?? 'https://seusite.com' . $_SERVER['REQUEST_URI']) ?>">

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
    <?= $this->insert('components/sections/header') ?>

    <main class="min-h-[30vh] mt-[80px]">
        <?= $this->section('main_content') ?>
    </main>

    <?= $this->insert('components/sections/footer') ?>

    <?= $this->insert('components/common/whatsapp-float') ?>

    <?= $this->insert('components/common/privacy-popup') ?>

    <?php if ($siteConfig['gtm']): ?>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $siteConfig['gtm'] ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php endif; ?>
</body>
</html> 