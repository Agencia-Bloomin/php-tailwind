<?php
return [
    // Configurações do servidor SMTP
    'smtp' => [
        'host' => 'mail.bloomin.com.br',
        'username' => 'mail@bloomin.com.br',
        'password' => 'bloomin2022',
        'port' => 587,
        'encryption' => 'tls',
    ],

    // Configurações do remetente
    'from' => [
        'email' => 'mail@bloomin.com.br',
        'name' => 'Template PHP Tailwind',
    ],

    // Email de teste (para desenvolvimento)
    'test' => [
        'email' => 'celyna.dmnll@gmail.com',
        'name' => 'Desenvolvedor Teste',
        'enabled' => true, // Ativar/desativar emails de teste
    ],

    // Email principal do cliente
    'client' => [
        'email' => 'pedrobcoding@gmail.com',
        'name' => 'Cliente Principal',
        'enabled' => true, // Ativar/desativar emails do cliente
    ],

    // Configurações de resposta (opcional)
    'reply_to' => [
        'email' => 'contato@bloomin.com.br',
        'name' => 'Contato Bloomin',
    ],

    // Configurações gerais
    'settings' => [
        'debug' => false, // Ativar debug do SMTP
        'timeout' => 30, // Timeout em segundos
        'charset' => 'UTF-8',
    ],
];
