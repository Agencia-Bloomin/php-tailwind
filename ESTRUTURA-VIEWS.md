# 📁 Estrutura de Views - Template PHP

## 🎯 Visão Geral

A estrutura de views foi reorganizada para maior clareza semântica e facilidade de manutenção.

## 📂 Estrutura Atual

```
src/views/
├── home.php          # Página principal (/)
├── about.php         # Página sobre (/sobre)
├── services.php      # Página serviços (/servicos)
├── contact.php       # Página contato (/contato)
├── faq.php          # Página FAQ (/faq)
├── 404.php          # Página erro 404
├── 405.php          # Página erro 405
├── sitemap.php      # Página sitemap (/mapa-site)
├── dynamic.php      # Página dinâmica (/{slug})
├── components/      # Componentes reutilizáveis
│   ├── layout/      # Header, Footer
│   ├── sections/    # Seções de conteúdo
│   └── ui/          # Elementos UI
└── layout/          # Templates base
    └── base.php     # Layout principal
```

## 🔧 Explicação da Estrutura

### **Páginas (Raiz da views/)**

- **Localização**: `src/views/`
- **Função**: Arquivos que se tornam URLs diretas no site
- **Exemplo**: `home.php` → `/`, `about.php` → `/sobre`
- **Vantagem**: Fácil localização e manutenção

### **Layouts (Pasta layout/)**

- **Localização**: `src/views/layout/`
- **Função**: Templates base que definem a estrutura HTML
- **Exemplo**: `base.php` → Template principal com `<head>`, `<body>`, etc.
- **Vantagem**: Separação clara entre conteúdo e estrutura

### **Componentes (Pasta components/)**

- **Localização**: `src/views/components/`
- **Função**: Elementos reutilizáveis
- **Estrutura**:
  - `layout/` → Header, Footer, navegação
  - `sections/` → Seções de conteúdo (hero, about, services)
  - `ui/` → Elementos de interface (botões, modais, etc.)

## 📝 Como Usar

### **Criando uma Nova Página**

1. **Criar arquivo na raiz**:

```php
// src/views/nova-pagina.php
<?php
$siteConfig = require dirname(__DIR__) . '/config/site.php';
$seoConfig = require dirname(__DIR__) . '/config/seo.php';

$this->layout('layout/base', [
    'title' => 'Título da Página',
    'description' => 'Descrição da página',
    'canonical' => '/nova-pagina'
]);
?>

<?php $this->start('main_content') ?>
    <!-- Conteúdo da página -->
    <?= $this->insert('components/sections/hero') ?>
<?php $this->stop() ?>
```

2. **Adicionar rota no Router**:

```php
// src/Core/Router.php
$r->addRoute('GET', $baseUrl . '/nova-pagina', 'nova-pagina');
```

### **Criando um Novo Componente**

```php
// src/views/components/sections/novo-componente.php
<div class="novo-componente">
    <h2><?= $title ?? 'Título Padrão' ?></h2>
    <p><?= $description ?? 'Descrição padrão' ?></p>
</div>
```

### **Usando Componentes**

```php
<?= $this->insert('components/sections/novo-componente', [
    'title' => 'Título Customizado',
    'description' => 'Descrição customizada'
]) ?>
```

## 🎯 Vantagens da Nova Estrutura

### **1. Clareza Semântica**

- `layout/` → Deixa claro que é template base
- Páginas na raiz → Fácil identificação de URLs

### **2. Facilidade de Navegação**

- Páginas principais visíveis na raiz
- Componentes organizados por função

### **3. Padrão Next.js**

- Estrutura similar ao Next.js
- Facilita migração futura

### **4. Manutenção**

- Estrutura intuitiva
- Separação clara de responsabilidades

## 🔄 Migração de Next.js

Para migração futura para Next.js:

```
src/views/                    → pages/
├── home.php                  → pages/index.js
├── about.php                 → pages/about.js
├── services.php              → pages/services.js
├── contact.php               → pages/contact.js
├── layout/                   → layouts/
│   └── base.php              → layouts/base.js
└── components/               → components/
    ├── layout/               → components/layout/
    ├── sections/             → components/sections/
    └── ui/                   → components/ui/
```

## 📚 Boas Práticas

1. **Nomenclatura**: Use nomes descritivos para arquivos
2. **Organização**: Mantenha componentes relacionados na mesma pasta
3. **Reutilização**: Crie componentes genéricos quando possível
4. **Documentação**: Comente componentes complexos
5. **Consistência**: Mantenha padrão de nomenclatura

## 🚀 Próximos Passos

A estrutura está pronta para:

- ✅ Desenvolvimento de novas páginas
- ✅ Criação de componentes reutilizáveis
- ✅ Migração para Next.js
- ✅ Manutenção simplificada
