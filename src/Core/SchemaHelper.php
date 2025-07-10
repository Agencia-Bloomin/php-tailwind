<?php

namespace App\Core;

class SchemaHelper
{
    private array $schemaConfig;
    private array $siteConfig;

    public function __construct()
    {
        $this->schemaConfig = require dirname(__DIR__) . '/config/schema.php';
        $this->siteConfig = require dirname(__DIR__) . '/config/site.php';
    }

    /**
     * Processa variáveis no schema
     */
    private function processSchemaVariables(array $schema): array
    {
        $processed = json_encode($schema);

        // Substituir variáveis
        $replacements = [
            '{{site_name}}' => $this->siteConfig['site_name'],
            '{{site_url}}' => $this->siteConfig['url'],
            '{{company_name}}' => $this->siteConfig['company_name'],
            '{{social_facebook}}' => $this->siteConfig['social']['facebook'] ?: 'https://www.facebook.com/' . strtolower($this->siteConfig['company_name']),
            '{{social_instagram}}' => $this->siteConfig['social']['instagram'] ?: 'https://www.instagram.com/' . strtolower($this->siteConfig['company_name']),
            '{{social_linkedin}}' => $this->siteConfig['social']['linkedin'] ?: 'https://www.linkedin.com/company/' . strtolower($this->siteConfig['company_name'])
        ];

        $processed = str_replace(array_keys($replacements), array_values($replacements), $processed);

        return json_decode($processed, true);
    }

    /**
     * Gera o JSON-LD para uma página específica
     */
    public function generateSchema(string $page, array $customData = []): string
    {
        $schemas = [];

        // Schema da organização (sempre presente)
        $schemas[] = $this->processSchemaVariables($this->schemaConfig['organization']);

        // Schema específico da página
        if (isset($this->schemaConfig[$page])) {
            $pageSchema = $this->processSchemaVariables($this->schemaConfig[$page]);

            // Mesclar dados customizados
            if (!empty($customData)) {
                $pageSchema = array_merge($pageSchema, $customData);
            }

            $schemas[] = $pageSchema;
        }

        // Se for página de serviços, adicionar schemas dos serviços
        if ($page === 'services') {
            foreach ($this->schemaConfig['services'] as $service) {
                $schemas[] = $this->processSchemaVariables($service);
            }
        }

        return json_encode($schemas, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Gera schema para uma página dinâmica
     */
    public function generateDynamicSchema(array $pageData): string
    {
        $schemas = [$this->processSchemaVariables($this->schemaConfig['organization'])];

        $webPageSchema = [
            '@type' => 'WebPage',
            'name' => $pageData['title'] ?? 'Página Dinâmica',
            'description' => $pageData['description'] ?? '',
            'url' => $this->siteConfig['url'] . ($pageData['url'] ?? ''),
            'datePublished' => $pageData['created_at'] ?? date('c'),
            'dateModified' => $pageData['updated_at'] ?? date('c')
        ];

        $schemas[] = $webPageSchema;

        return json_encode($schemas, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Gera schema para breadcrumbs
     */
    public function generateBreadcrumbSchema(array $breadcrumbs): string
    {
        $schema = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => []
        ];

        foreach ($breadcrumbs as $index => $breadcrumb) {
            $schema['itemListElement'][] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $breadcrumb['name'],
                'item' => $this->siteConfig['url'] . $breadcrumb['url']
            ];
        }

        return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Gera schema para local business
     */
    public function generateLocalBusinessSchema(): string
    {
        $seoConfig = require dirname(__DIR__) . '/config/seo.php';
        $schema = [
            '@type' => 'LocalBusiness',
            'name' => $this->siteConfig['company_name'],
            'description' => $seoConfig['home']['description'],
            'url' => $this->siteConfig['url'],
            'telephone' => '+' . $this->siteConfig['phone']['number'],
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $this->siteConfig['address']['street'],
                'addressLocality' => $this->siteConfig['address']['city'],
                'addressRegion' => $this->siteConfig['address']['state'],
                'postalCode' => $this->siteConfig['address']['zip'],
                'addressCountry' => 'BR'
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => -23.5505,
                'longitude' => -46.6333
            ],
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '08:00',
                    'closes' => '18:00'
                ]
            ],
            'priceRange' => '$$',
            'servesCuisine' => 'Soldagem Industrial',
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Serviços de Soldagem',
                'itemListElement' => [
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Soldagem MIG/MAG'
                        ]
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Soldagem TIG'
                        ]
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Corte a Laser'
                        ]
                    ]
                ]
            ]
        ];

        return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
