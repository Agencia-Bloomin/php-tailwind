<?php

/**
 * Configuração de SEO - Metadados para todas as páginas
 */
return [
    // Página inicial
    'home' => [
        'title' => 'Celyna - Soldagem e Corte a Laser em São Paulo',
        'description' => 'Especialistas em soldagem e corte a laser em São Paulo. Serviços de qualidade com equipamentos modernos e profissionais experientes.',
        'keywords' => 'soldagem, corte a laser, São Paulo, metalurgia, indústria, manutenção',
        'og_title' => 'Celyna - Soldagem e Corte a Laser em São Paulo',
        'og_description' => 'Especialistas em soldagem e corte a laser em São Paulo. Serviços de qualidade com equipamentos modernos.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/'
    ],

    // Página de serviços
    'services' => [
        'title' => 'Serviços de Soldagem e Corte a Laser - Celyna',
        'description' => 'Oferecemos serviços especializados de soldagem MIG/MAG, TIG, eletrodo revestido e corte a laser. Qualidade garantida em São Paulo.',
        'keywords' => 'soldagem MIG, soldagem TIG, eletrodo revestido, corte a laser, serviços metalúrgicos, São Paulo',
        'og_title' => 'Serviços de Soldagem e Corte a Laser - Celyna',
        'og_description' => 'Oferecemos serviços especializados de soldagem MIG/MAG, TIG, eletrodo revestido e corte a laser.',
        'og_image' => '/src/assets/images/soldagem.jpg',
        'canonical' => '/services'
    ],

    // Página de contato
    'contact' => [
        'title' => 'Contato - Celyna Soldagem e Corte a Laser',
        'description' => 'Entre em contato conosco para orçamentos de soldagem e corte a laser em São Paulo. Atendimento rápido e profissional.',
        'keywords' => 'contato, orçamento, soldagem, corte a laser, São Paulo, Celyna',
        'og_title' => 'Contato - Celyna Soldagem e Corte a Laser',
        'og_description' => 'Entre em contato conosco para orçamentos de soldagem e corte a laser em São Paulo.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/contact'
    ],

    // Página sobre nós
    'about' => [
        'title' => 'Sobre Nós - Celyna Soldagem e Corte a Laser',
        'description' => 'Conheça a Celyna, empresa especializada em soldagem e corte a laser em São Paulo. Experiência e qualidade em cada projeto.',
        'keywords' => 'sobre nós, Celyna, história, experiência, soldagem, corte a laser, São Paulo',
        'og_title' => 'Sobre Nós - Celyna Soldagem e Corte a Laser',
        'og_description' => 'Conheça a Celyna, empresa especializada em soldagem e corte a laser em São Paulo.',
        'og_image' => '/src/assets/images/bancada.webp',
        'canonical' => '/about'
    ],

    // Página de FAQ
    'faq' => [
        'title' => 'Perguntas Frequentes - Celyna Soldagem e Corte a Laser',
        'description' => 'Respostas para as principais dúvidas sobre nossos serviços de soldagem e corte a laser em São Paulo.',
        'keywords' => 'FAQ, perguntas frequentes, dúvidas, soldagem, corte a laser, Celyna',
        'og_title' => 'Perguntas Frequentes - Celyna Soldagem e Corte a Laser',
        'og_description' => 'Respostas para as principais dúvidas sobre nossos serviços de soldagem e corte a laser.',
        'og_image' => '/src/assets/images/soldagem-laser.jpg',
        'canonical' => '/faq'
    ],

    // Página 404
    '404' => [
        'title' => 'Página não encontrada - Celyna',
        'description' => 'A página que você está procurando não foi encontrada. Volte para a página inicial da Celyna.',
        'keywords' => '404, página não encontrada, erro, Celyna',
        'og_title' => 'Página não encontrada - Celyna',
        'og_description' => 'A página que você está procurando não foi encontrada.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/404'
    ],

    // Página 405
    '405' => [
        'title' => 'Método não permitido - 405',
        'description' => 'O método de requisição não é permitido para esta página.',
        'keywords' => '405, método não permitido, erro, Celyna',
        'og_title' => 'Método não permitido - 405',
        'og_description' => 'O método de requisição não é permitido para esta página.',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/405'
    ],

    // Página Sitemap
    'sitemap' => [
        'title' => 'Mapa do Site - Celyna',
        'description' => 'Lista completa de todas as páginas disponíveis em nosso site',
        'keywords' => 'sitemap, mapa do site, páginas, navegação',
        'og_title' => 'Mapa do Site - Celyna',
        'og_description' => 'Lista completa de todas as páginas disponíveis em nosso site',
        'og_image' => '/src/assets/images/local.webp',
        'canonical' => '/sitemap'
    ],

    // Configurações globais
    'global' => [
        'site_name' => 'Celyna',
        'site_description' => 'Especialistas em soldagem e corte a laser em São Paulo',
        'author' => 'Celyna',
        'language' => 'pt-BR',
        'robots' => 'index, follow',
        'viewport' => 'width=device-width, initial-scale=1.0',
        'charset' => 'UTF-8',
        'theme_color' => '#1f2937',
        'twitter_card' => 'summary_large_image',
        'twitter_site' => '@celyna',
        'twitter_creator' => '@celyna'
    ]
];
