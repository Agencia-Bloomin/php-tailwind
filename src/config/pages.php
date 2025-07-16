<?php

/**
 * Configuração centralizada de todas as páginas do site
 * Este arquivo serve como fonte única da verdade para todas as páginas
 */
return [
    // Página inicial
    'home' => [
        'route' => '/',
        'view' => 'home',
        'methods' => ['GET', 'POST'],
        'seo' => [
            'title' => '{{site_name}}',
            'hero_title' => 'Bem-vindo à Bloomin!',
            'description' => '{{site_name}} lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'keywords' => 'template, php, bloomin',
            'og_title' => '{{site_name}}',
            'og_description' => '{{site_name}} lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'og_image' => '/src/assets/images/local.webp',
            'canonical' => '/'
        ],
        'sitemap' => [
            'changefreq' => 'daily',
            'priority' => '1.0'
        ]
    ],

    // Página de serviços
    'services' => [
        'route' => '/servicos',
        'view' => 'services',
        'methods' => ['GET'],
        'seo' => [
            'title' => 'Serviços - {{site_name}}',
            'hero_title' => 'Nossos Serviços',
            'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'keywords' => 'template, php, bloomin',
            'og_title' => 'Serviços - {{site_name}}',
            'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'og_image' => '/src/assets/images/local.webp',
            'canonical' => '/servicos'
        ],
        'sitemap' => [
            'changefreq' => 'weekly',
            'priority' => '0.9'
        ]
    ],

    // Página de contato
    'contact' => [
        'route' => '/contato',
        'view' => 'contact',
        'methods' => ['GET', 'POST'],
        'seo' => [
            'title' => 'Contato - {{site_name}}',
            'hero_title' => 'Entre em Contato',
            'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'keywords' => 'template, php, bloomin',
            'og_title' => 'Contato - {{site_name}}',
            'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'og_image' => '/src/assets/images/local.webp',
            'canonical' => '/contato'
        ],
        'sitemap' => [
            'changefreq' => 'monthly',
            'priority' => '0.7'
        ]
    ],

    // Página sobre nós
    'about' => [
        'route' => '/sobre',
        'view' => 'about',
        'methods' => ['GET'],
        'seo' => [
            'title' => 'Sobre Nós - {{site_name}}',
            'hero_title' => 'Sobre Nós',
            'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'keywords' => 'template, php, bloomin',
            'og_title' => 'Sobre Nós - {{site_name}}',
            'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'og_image' => '/src/assets/images/bancada.webp',
            'canonical' => '/sobre'
        ],
        'sitemap' => [
            'changefreq' => 'monthly',
            'priority' => '0.8'
        ]
    ],

    // Página de FAQ
    'faq' => [
        'route' => '/faq',
        'view' => 'faq',
        'methods' => ['GET'],
        'seo' => [
            'title' => 'Perguntas Frequentes - {{site_name}}',
            'hero_title' => 'Perguntas Frequentes',
            'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'keywords' => 'template, php, bloomin',
            'og_title' => 'Perguntas Frequentes - {{site_name}}',
            'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'og_image' => '/src/assets/images/local.webp',
            'canonical' => '/faq'
        ],
        'sitemap' => [
            'changefreq' => 'monthly',
            'priority' => '0.6'
        ]
    ],

    // Página de mapa do site
    'sitemap' => [
        'route' => '/mapa-site',
        'view' => 'sitemap',
        'methods' => ['GET'],
        'seo' => [
            'title' => 'Mapa do Site - {{site_name}}',
            'hero_title' => 'Mapa do Site',
            'description' => 'Lista completa de todas as páginas disponíveis em nosso site',
            'keywords' => 'sitemap, mapa do site, páginas, navegação',
            'og_title' => 'Mapa do Site - {{site_name}}',
            'og_description' => 'Lista completa de todas as páginas disponíveis em nosso site',
            'og_image' => '/src/assets/images/local.webp',
            'canonical' => '/mapa-site'
        ],
        'sitemap' => [
            'changefreq' => 'monthly',
            'priority' => '0.5'
        ]
    ],

    // Páginas de erro
    '404' => [
        'route' => null, // Não tem rota específica, é tratada pelo router
        'view' => '404',
        'methods' => [],
        'seo' => [
            'title' => 'Página não encontrada - {{site_name}}',
            'hero_title' => 'Página não encontrada',
            'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'keywords' => 'template, php, bloomin',
            'og_title' => 'Página não encontrada - {{site_name}}',
            'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'og_image' => '/src/assets/images/local.webp',
            'canonical' => '/404'
        ],
        'sitemap' => [
            'changefreq' => 'never',
            'priority' => '0.1'
        ]
    ],

    '405' => [
        'route' => null, // Não tem rota específica, é tratada pelo router
        'view' => '405',
        'methods' => [],
        'seo' => [
            'title' => 'Método não permitido - 405',
            'hero_title' => 'Método não permitido',
            'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'keywords' => 'template, php, bloomin',
            'og_title' => 'Método não permitido - 405',
            'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
            'og_image' => '/src/assets/images/local.webp',
            'canonical' => '/405'
        ],
        'sitemap' => [
            'changefreq' => 'never',
            'priority' => '0.1'
        ]
    ],
];
