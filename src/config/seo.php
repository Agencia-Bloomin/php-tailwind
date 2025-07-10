<?php

/**
 * Configuração de SEO - Metadados para todas as páginas
 */
return [
    // Página inicial
    'home' => [
        'title' => '{{site_name}}',
        'description' => 'Template PHP Bloomin lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => '{{site_name}}',
        'og_description' => 'Template PHP Bloomin lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/'
    ],

    // Página de serviços
    'services' => [
        'title' => 'Serviços - {{company_name}}',
        'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => 'Serviços - {{company_name}}',
        'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/servicos'
    ],

    // Página de contato
    'contact' => [
        'title' => 'Contato - {{company_name}}',
        'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => 'Contato - {{company_name}}',
        'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/contato'
    ],

    // Página sobre nós
    'about' => [
        'title' => 'Sobre Nós - {{company_name}}',
        'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => 'Sobre Nós - {{company_name}}',
        'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'og_image' => '/src/assets/images/bancada.webp',
        'canonical' => '/sobre'
    ],

    // Página de FAQ
    'faq' => [
        'title' => 'Perguntas Frequentes - {{company_name}}',
        'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => 'Perguntas Frequentes - {{company_name}}',
        'og_description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/faq'
    ],

    // Página 404
    '404' => [
        'title' => 'Página não encontrada - {{company_name}}',
        'description' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
        'keywords' => 'template, php, bloomin',
        'og_title' => 'Página não encontrada - {{company_name}}',
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
        'title' => 'Mapa do Site - {{company_name}}',
        'description' => 'Lista completa de todas as páginas disponíveis em nosso site',
        'keywords' => 'sitemap, mapa do site, páginas, navegação',
        'og_title' => 'Mapa do Site - {{company_name}}',
        'og_description' => 'Lista completa de todas as páginas disponíveis em nosso site',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/mapa-site'
    ],

    // Configurações globais (igual à home/index)
    'global' => [
        'site_name' => '{{site_name}}',
        'site_description' => '{{home_description}}',
        'author' => '{{company_name}}',
        'language' => 'pt-BR',
        'robots' => 'index, follow',
        'viewport' => 'width=device-width, initial-scale=1.0',
        'charset' => 'UTF-8',
        'theme_color' => '#1f2937',
        'twitter_card' => 'summary_large_image',
        'twitter_site' => '{{twitter_site}}',
        'twitter_creator' => '{{twitter_creator}}'
    ]
];
