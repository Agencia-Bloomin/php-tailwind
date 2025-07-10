<?php

/**
 * Configuração de SEO - Metadados para todas as páginas
 */
return [
    // Página inicial
    'home' => [
        'title' => '{{site_name}}',
        'description' => '{{site_name}} lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => '{{site_name}}',
        'og_description' => '{{site_name}} lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/'
    ],

    // Página de serviços
    'services' => [
        'title' => 'Serviços - {{site_name}}',
        'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => 'Serviços - {{site_name}}',
        'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/servicos'
    ],

    // Página de contato
    'contact' => [
        'title' => 'Contato - {{site_name}}',
        'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => 'Contato - {{site_name}}',
        'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/contato'
    ],

    // Página sobre nós
    'about' => [
        'title' => 'Sobre Nós - {{site_name}}',
        'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => 'Sobre Nós - {{site_name}}',
        'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'og_image' => '/src/assets/images/bancada.webp',
        'canonical' => '/sobre'
    ],

    // Página de FAQ
    'faq' => [
        'title' => 'Perguntas Frequentes - {{site_name}}',
        'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => 'Perguntas Frequentes - {{site_name}}',
        'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/faq'
    ],

    // Página 404
    '404' => [
        'title' => 'Página não encontrada - {{site_name}}',
        'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => 'Página não encontrada - {{site_name}}',
        'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/404'
    ],

    // Página 405
    '405' => [
        'title' => 'Método não permitido - 405',
        'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => 'Método não permitido - 405',
        'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/405'
    ],

    // Página Sitemap
    'sitemap' => [
        'title' => 'Mapa do Site - {{site_name}}',
        'description' => 'Lista completa de todas as páginas disponíveis em nosso site',
        'keywords' => 'sitemap, mapa do site, páginas, navegação',
        'og_title' => 'Mapa do Site - {{site_name}}',
        'og_description' => 'Lista completa de todas as páginas disponíveis em nosso site',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/mapa-site'
    ]
];
