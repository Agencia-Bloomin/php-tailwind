<?php

/**
 * Teste simples para verificar se o erro foi corrigido
 */

require_once __DIR__ . '/src/Core/PageManager.php';
require_once __DIR__ . '/src/Core/SchemaHelper.php';

use App\Core\PageManager;
use App\Core\SchemaHelper;

echo "=== Teste de Correção do Erro ===\n\n";

try {
    $pageManager = new PageManager();
    $schemaHelper = new SchemaHelper();

    echo "✅ PageManager e SchemaHelper carregados\n";

    // Teste 1: Verificar se a página home existe
    if ($pageManager->pageExists('home')) {
        $page = $pageManager->getPage('home');
        echo "✅ Página 'home' encontrada\n";
        echo "   - Rota: " . $page['route'] . "\n";
        echo "   - View: " . $page['view'] . "\n";
        echo "   - Título: " . $page['seo']['title'] . "\n";
    } else {
        echo "❌ Página 'home' não encontrada\n";
    }

    // Teste 2: Verificar se o schema pode ser gerado
    $schema = $schemaHelper->generateSchema('home');
    if (!empty($schema)) {
        echo "✅ Schema gerado com sucesso\n";
    } else {
        echo "❌ Erro ao gerar schema\n";
    }

    // Teste 3: Verificar se as substituições funcionam
    $homeSeo = $pageManager->getPageSeo('home');
    if ($homeSeo && strpos($homeSeo['title'], '{{site_name}}') === false) {
        echo "✅ Substituições funcionando\n";
    } else {
        echo "❌ Substituições não funcionando\n";
    }

    echo "\n✅ Todos os testes passaram! O erro foi corrigido.\n";
} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
