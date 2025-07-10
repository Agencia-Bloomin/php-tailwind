<?php

/**
 * Configuração de Schema.org Structured Data
 */
return [
    // Schema da organização
    'organization' => [
        '@type' => 'Organization',
        'name' => '{{site_name}}',
        'url' => '{{site_url}}',
        'logo' => '{{site_url}}/src/assets/images/logo.png',
        'description' => '{{site_description}}',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Rua Example, 123',
            'addressLocality' => 'São Paulo',
            'addressRegion' => 'SP',
            'postalCode' => '01234-567',
            'addressCountry' => 'BR'
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => '+55-11-99999-9999',
            'contactType' => 'customer service',
            'availableLanguage' => 'Portuguese'
        ],
        'sameAs' => [
            '{{social_facebook}}',
            '{{social_instagram}}',
            '{{social_linkedin}}'
        ]
    ],

    // Schema dos serviços
    'services' => [
        'soldagem_mig_mag' => [
            '@type' => 'Service',
            'name' => 'Soldagem MIG/MAG',
            'description' => 'Serviços especializados de soldagem MIG/MAG para diversos tipos de metais',
            'provider' => [
                '@type' => 'Organization',
                'name' => '{{company_name}}'
            ],
            'areaServed' => [
                '@type' => 'City',
                'name' => 'São Paulo'
            ],
            'serviceType' => 'Soldagem Industrial'
        ],
        'soldagem_tig' => [
            '@type' => 'Service',
            'name' => 'Soldagem TIG',
            'description' => 'Soldagem TIG de alta precisão para metais nobres e aços especiais',
            'provider' => [
                '@type' => 'Organization',
                'name' => '{{company_name}}'
            ],
            'areaServed' => [
                '@type' => 'City',
                'name' => 'São Paulo'
            ],
            'serviceType' => 'Soldagem de Precisão'
        ],
        'corte_laser' => [
            '@type' => 'Service',
            'name' => 'Corte a Laser',
            'description' => 'Corte a laser de alta precisão para diversos materiais',
            'provider' => [
                '@type' => 'Organization',
                'name' => '{{company_name}}'
            ],
            'areaServed' => [
                '@type' => 'City',
                'name' => 'São Paulo'
            ],
            'serviceType' => 'Corte Industrial'
        ]
    ],

    // Schema da página inicial
    'home' => [
        '@type' => 'WebPage',
        'name' => '{{site_name}}',
        'description' => '{{site_description}}',
        'url' => '{{site_url}}/',
        'mainEntity' => [
            '@type' => 'Organization',
            'name' => '{{company_name}}'
        ]
    ],

    // Schema de FAQ
    'faq' => [
        '@type' => 'FAQPage',
        'mainEntity' => [
            [
                '@type' => 'Question',
                'name' => 'Quais tipos de soldagem vocês oferecem?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Oferecemos soldagem MIG/MAG, TIG, eletrodo revestido e corte a laser.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Vocês atendem em toda São Paulo?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Sim, atendemos toda a região de São Paulo e Grande São Paulo.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Como solicitar um orçamento?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Entre em contato conosco pelo telefone, WhatsApp ou formulário do site para solicitar um orçamento personalizado.'
                ]
            ]
        ]
    ],

    // Schema de contato
    'contact' => [
        '@type' => 'ContactPage',
        'name' => 'Contato - {{company_name}}',
        'description' => 'Entre em contato conosco para orçamentos de soldagem e corte a laser',
        'url' => '{{site_url}}/contato',
        'mainEntity' => [
            '@type' => 'Organization',
            'name' => '{{company_name}}'
        ]
    ]
];
