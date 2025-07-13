<?php

namespace App\Core;

class PageManager
{
    private array $pages;
    private array $replacements;

    public function __construct()
    {
        $this->pages = require dirname(__DIR__) . '/config/pages.php';

        // Carrega as configurações para substituições
        $siteConfig = require dirname(__DIR__) . '/config/site.php';

        $this->replacements = [
            '{{site_name}}' => $siteConfig['site_name'],
            '{{company_name}}' => $siteConfig['company_name']
        ];
    }

    /**
     * Retorna todas as páginas configuradas
     */
    public function getAllPages(): array
    {
        return $this->pages;
    }

    /**
     * Retorna apenas páginas que devem aparecer no sitemap
     */
    public function getSitemapPages(): array
    {
        return array_filter($this->pages, function ($page) {
            return $page['route'] !== null &&
                isset($page['sitemap']) &&
                $page['sitemap']['changefreq'] !== 'never';
        });
    }

    /**
     * Retorna configuração SEO de uma página específica
     */
    public function getPageSeo(string $pageKey): ?array
    {
        if (!isset($this->pages[$pageKey])) {
            return null;
        }

        $seo = $this->pages[$pageKey]['seo'];

        // Aplica as substituições nos valores SEO
        return $this->applyReplacements($seo);
    }

    /**
     * Retorna configuração completa de uma página
     */
    public function getPage(string $pageKey): ?array
    {
        if (!isset($this->pages[$pageKey])) {
            return null;
        }

        $page = $this->pages[$pageKey];

        // Aplica as substituições na configuração SEO
        if (isset($page['seo'])) {
            $page['seo'] = $this->applyReplacements($page['seo']);
        }

        return $page;
    }

    /**
     * Verifica se uma página existe
     */
    public function pageExists(string $pageKey): bool
    {
        return isset($this->pages[$pageKey]);
    }

    /**
     * Retorna a view de uma página
     */
    public function getPageView(string $pageKey): ?string
    {
        return $this->pages[$pageKey]['view'] ?? null;
    }

    /**
     * Retorna os métodos HTTP permitidos para uma página
     */
    public function getPageMethods(string $pageKey): array
    {
        return $this->pages[$pageKey]['methods'] ?? [];
    }

    /**
     * Aplica substituições em um array
     */
    private function applyReplacements(array $data): array
    {
        $json = json_encode($data);
        $processed = str_replace(array_keys($this->replacements), array_values($this->replacements), $json);
        return json_decode($processed, true);
    }

    /**
     * Gera dados para o sitemap
     */
    public function generateSitemapData(string $baseUrl): array
    {
        $sitemapData = [];

        foreach ($this->getSitemapPages() as $pageKey => $page) {
            $sitemapData[$page['route']] = [
                'url' => $baseUrl . $page['route'],
                'lastmod' => date('c'),
                'changefreq' => $page['sitemap']['changefreq'],
                'priority' => $page['sitemap']['priority']
            ];
        }

        return $sitemapData;
    }

    /**
     * Adiciona uma nova página dinamicamente
     */
    public function addPage(string $pageKey, array $pageConfig): void
    {
        $this->pages[$pageKey] = $pageConfig;
    }

    /**
     * Remove uma página
     */
    public function removePage(string $pageKey): void
    {
        unset($this->pages[$pageKey]);
    }
}
