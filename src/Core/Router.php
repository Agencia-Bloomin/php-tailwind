<?php

namespace App\Core;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use League\Plates\Engine;
use function FastRoute\simpleDispatcher;
use App\Core\SchemaHelper;

class Router
{
    private Dispatcher $dispatcher;
    private Engine $templates;
    private ApiClient $apiClient;
    private SchemaHelper $schemaHelper;

    public function __construct()
    {
        $this->templates = new Engine(dirname(__DIR__) . '/views');
        $this->apiClient = new ApiClient();
        $this->schemaHelper = new SchemaHelper();

        $this->templates->addData(['year' => date('Y')]);

        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        $baseDir = str_replace('\\', '/', dirname($scriptName));
        $baseUrl = rtrim($baseDir, '/');

        if ($baseUrl === '') {
            $baseUrl = '';
        }

        $this->dispatcher = simpleDispatcher(function (RouteCollector $r) use ($baseUrl) {
            $r->addRoute('GET', $baseUrl . '/', 'home');
            $r->addRoute('GET', $baseUrl . '/servicos', 'services');
            $r->addRoute('GET', $baseUrl . '/contato', 'contact');
            $r->addRoute('GET', $baseUrl . '/sobre', 'about');
            $r->addRoute('GET', $baseUrl . '/faq', 'faq');
            $r->addRoute('GET', $baseUrl . '/mapa-site', 'sitemap');
            $r->addRoute('GET', $baseUrl . '/sitemap.xml', 'sitemap');
            $r->addRoute('GET', $baseUrl . '/robots.txt', 'robots');
            $r->addRoute('GET', $baseUrl . '/{slug}', 'dynamic');
        });
    }

    private function renderView(string $view, array $data = []): string
    {
        // Adicionar schema se não estiver definido
        if (!isset($data['schema'])) {
            $data['schema'] = $this->schemaHelper->generateSchema($view);
        }

        // Processar variáveis no SEO config
        $data = $this->processSeoVariables($data);

        return $this->templates->render($view, $data);
    }

    private function processSeoVariables(array $data): array
    {
        $siteConfig = require dirname(__DIR__) . '/config/site.php';
        $seoConfig = require dirname(__DIR__) . '/config/seo.php';

        // Substituir variáveis em strings
        $replacements = [
            '{{site_name}}' => $siteConfig['site_name'],
            '{{company_name}}' => $siteConfig['company_name'],
            '{{home_description}}' => $seoConfig['home']['description'],
            '{{site_description}}' => $seoConfig['home']['description']
        ];

        // Processar recursivamente os arrays
        array_walk_recursive($data, function (&$value) use ($replacements) {
            if (is_string($value)) {
                $value = str_replace(array_keys($replacements), array_values($replacements), $value);
            }
        });

        return $data;
    }

    private function generateSitemap(): string
    {
        $siteConfig = require dirname(__DIR__) . '/config/site.php';
        $baseUrl = $siteConfig['url'];

        // Rotas estáticas
        $staticRoutes = [
            '/' => [
                'url' => $baseUrl . '/',
                'lastmod' => date('c'),
                'changefreq' => 'daily',
                'priority' => '1.0'
            ],
            '/servicos' => [
                'url' => $baseUrl . '/servicos',
                'lastmod' => date('c'),
                'changefreq' => 'weekly',
                'priority' => '0.9'
            ],
            '/contato' => [
                'url' => $baseUrl . '/contato',
                'lastmod' => date('c'),
                'changefreq' => 'monthly',
                'priority' => '0.7'
            ],
            '/sobre' => [
                'url' => $baseUrl . '/sobre',
                'lastmod' => date('c'),
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
            '/faq' => [
                'url' => $baseUrl . '/faq',
                'lastmod' => date('c'),
                'changefreq' => 'monthly',
                'priority' => '0.6'
            ],
            '/mapa-site' => [
                'url' => $baseUrl . '/mapa-site',
                'lastmod' => date('c'),
                'changefreq' => 'monthly',
                'priority' => '0.5'
            ]
        ];

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

        // Combinar todas as rotas
        $allRoutes = array_merge($staticRoutes, $dynamicRoutes);

        // Gerar XML
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
        $content .= "Disallow: /admin/\n";  // Exemplo de disallow, ajuste conforme necessário
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
