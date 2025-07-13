<?php

namespace App\Core;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use League\Plates\Engine;
use function FastRoute\simpleDispatcher;
use App\Core\SchemaHelper;
use App\Core\PageManager;

class Router
{
    private Dispatcher $dispatcher;
    private Engine $templates;
    private ApiClient $apiClient;
    private SchemaHelper $schemaHelper;
    private PageManager $pageManager;

    public function __construct()
    {
        $this->templates = new Engine(dirname(__DIR__) . '/views');
        $this->apiClient = new ApiClient();
        $this->schemaHelper = new SchemaHelper();
        $this->pageManager = new PageManager();

        // Carrega as configurações
        $siteConfig = require dirname(__DIR__) . '/config/site.php';

        // Disponibiliza as configurações para TODOS os templates
        $this->templates->addData([
            'siteConfig' => $siteConfig,
            'pageManager' => $this->pageManager,
            'year' => date('Y')
        ]);

        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        $baseDir = str_replace('\\', '/', dirname($scriptName));
        $baseUrl = rtrim($baseDir, '/');

        if ($baseUrl === '') {
            $baseUrl = '';
        }

        $this->dispatcher = simpleDispatcher(function (RouteCollector $r) use ($baseUrl) {
            // Registra rotas automaticamente baseadas na configuração de páginas
            foreach ($this->pageManager->getAllPages() as $pageKey => $page) {
                if ($page['route'] !== null) {
                    $methods = $page['methods'];
                    $route = $baseUrl . $page['route'];

                    if (is_array($methods)) {
                        $r->addRoute($methods, $route, $pageKey);
                    } else {
                        $r->addRoute([$methods], $route, $pageKey);
                    }
                }
            }

            // Rotas especiais
            $r->addRoute('GET', $baseUrl . '/sitemap.xml', 'sitemap');
            $r->addRoute('GET', $baseUrl . '/robots.txt', 'robots');
            $r->addRoute('GET', $baseUrl . '/{slug}', 'dynamic');
        });
    }

    private function renderView(string $pageKey, array $data = []): string
    {
        // Busca a configuração da página
        $page = $this->pageManager->getPage($pageKey);

        if ($page) {
            // Adiciona dados SEO da página
            $data = array_merge($data, [
                'seoConfig' => $page['seo'],
                'pageName' => $pageKey // Passa o nome da página
            ]);
        }

        // Adicionar schema se não estiver definido
        if (!isset($data['schema'])) {
            $data['schema'] = $this->schemaHelper->generateSchema($pageKey);
        }

        // Usa a view definida na configuração da página
        $view = $page['view'] ?? $pageKey;

        return $this->templates->render($view, $data);
    }

    private function generateSitemap(): string
    {
        $siteConfig = require dirname(__DIR__) . '/config/site.php';
        $baseUrl = $siteConfig['url'];

        // Rotas estáticas baseadas na configuração de páginas
        $staticRoutes = $this->pageManager->generateSitemapData($baseUrl);

        // Páginas dinâmicas da API
        $dynamicRoutes = [];
        $pages = $this->apiClient->getAllPages();

        if ($pages && is_array($pages)) {
            foreach ($pages as $page) {
                if (isset($page->url) || isset($page->slug)) {
                    $slug = $page->url ?? $page->slug;
                    $dynamicRoutes[$slug] = [
                        'url' => $baseUrl . '/' . ltrim($slug, '/'),
                        'lastmod' => isset($page->updated_at) ? date('c', strtotime($page->updated_at)) : date('c'),
                        'changefreq' => 'weekly',
                        'priority' => '0.9'
                    ];
                }
            }
        }

        $allRoutes = array_merge($staticRoutes, $dynamicRoutes);

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($allRoutes as $route) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($route['url']) . "</loc>\n";
            $xml .= "    <lastmod>" . $route['lastmod'] . "</lastmod>\n";
            $xml .= "    <changefreq>" . $route['changefreq'] . "</changefreq>\n";
            $xml .= "    <priority>" . $route['priority'] . "</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';
        return $xml;
    }

    private function generateRobotsTxt(): string
    {
        $siteConfig = require dirname(__DIR__) . '/config/site.php';
        $baseUrl = $siteConfig['url'];
        $sitemapUrl = $baseUrl . '/sitemap.xml';

        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /vendor/\n";
        $content .= "Disallow: /src/\n";
        $content .= "Sitemap: " . $sitemapUrl . "\n";

        return $content;
    }

    public function dispatch(): void
    {
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                header("HTTP/1.0 404 Not Found");
                echo $this->renderView('404');
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                header("HTTP/1.0 405 Method Not Allowed");
                echo $this->renderView('405');
                break;
            case Dispatcher::FOUND:
                $view = $routeInfo[1];
                $vars = $routeInfo[2];

                if ($view === 'sitemap') {
                    header('Content-Type: application/xml; charset=utf-8');
                    echo $this->generateSitemap();
                } else if ($view === 'robots') {
                    header('Content-Type: text/plain; charset=utf-8');
                    echo $this->generateRobotsTxt();
                } else {
                    echo $this->renderView($view, $vars);
                }
                break;
        }
    }
}
