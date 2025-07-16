# Template PHP Moderno

Um template moderno e responsivo desenvolvido com PHP, Tailwind CSS, Vite e GSAP para criar websites profissionais com animações fluidas.

## ✨ Características

- **🚀 Performance Otimizada**: Vite para build rápido e eficiente
- **🎨 Design Moderno**: Tailwind CSS para estilização rápida e responsiva
- **✨ Animações Fluidas**: GSAP para animações profissionais
- **📱 Totalmente Responsivo**: Adaptado para todos os dispositivos
- **🔧 Fácil Customização**: Estrutura modular e bem organizada
- **📧 Sistema de Email**: Integração com PHPMailer
- **🔍 SEO Otimizado**: Meta tags e schema markup automáticos

## 🛠️ Tecnologias Utilizadas

- **Backend**: PHP 8+
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **CSS Framework**: Tailwind CSS
- **Build Tool**: Vite
- **Animações**: GSAP (GreenSock)
- **Email**: PHPMailer
- **Gerenciador de Pacotes**: Composer, npm

## 📋 Pré-requisitos

Antes de começar, certifique-se de ter instalado:

- **PHP** 8.0 ou superior
- **Node.js** 16.0 ou superior
- **Composer** (gerenciador de dependências PHP)
- **npm** (gerenciador de pacotes Node.js)

## 🚀 Instalação

1. **Clone o repositório:**

   ```bash
   git clone [URL_DO_REPOSITORIO]
   cd php-tailwind
   ```

2. **Instale as dependências:**

   ```bash
   # Instalar dependências PHP
   composer install

   # Instalar dependências Node.js
   npm install
   ```

3. **Configure o ambiente:**
   - Copie e configure os arquivos de configuração em `src/config/`
   - Ajuste as configurações de email em `src/config/email.php`
   - Configure as páginas em `src/config/pages.php`

## 🏃‍♂️ Como Executar

### Modo Desenvolvimento

```bash
npm run dev
```

- Servidor PHP: `http://localhost:8000`
- Vite Dev Server: `http://localhost:5173`
- Hot reload ativado para desenvolvimento rápido

### Modo Produção

```bash
npm run build
```

- Gera arquivos otimizados na pasta `public/assets/`
- CSS e JS minificados para melhor performance

## 📁 Estrutura do Projeto

```
php-tailwind/
├── public/                 # Arquivos públicos
├── src/
│   ├── assets/            # Recursos estáticos
│   │   ├── css/          # Estilos CSS
│   │   ├── js/           # Scripts JavaScript
│   │   └── images/       # Imagens
│   ├── config/           # Configurações
│   ├── Core/             # Classes principais
│   └── views/            # Templates PHP
├── composer.json         # Dependências PHP
├── package.json          # Dependências Node.js
├── tailwind.config.js    # Configuração Tailwind
└── vite.config.js        # Configuração Vite
```

## 📄 Criando Novas Páginas

1. **Crie o arquivo da view:**

   ```php
   <!-- src/views/minha-pagina.php -->
   <?php $this->layout('layout/base', [
       'title' => 'Minha Página',
       'description' => 'Descrição da minha página',
       'keywords' => 'palavra-chave1, palavra-chave2'
   ]); ?>

   <section class="container mx-auto px-4 py-8">
       <h1 class="text-4xl font-bold mb-6">Minha Página</h1>
       <p class="text-lg">Conteúdo da página aqui...</p>
   </section>
   ```

2. **Configure a página no arquivo de configuração:**

   ```php
   // src/config/pages.php
   'minha-pagina' => [
       'route' => '/minha-pagina',
       'view' => 'minha-pagina',
       'methods' => ['GET'],
       'seo' => [
           'title' => 'Minha Página - {{site_name}}',
           'hero_title' => 'Minha Página',
           'description' => 'Descrição da página',
           'keywords' => 'palavras-chave',
           'og_title' => 'Minha Página - {{site_name}}',
           'og_description' => 'Descrição da página',
           'og_image' => '/src/assets/images/local.webp',
           'canonical' => '/minha-pagina'
       ],
       'sitemap' => [
           'changefreq' => 'weekly',
           'priority' => '0.8'
       ]
   ]
   ```

   **✨ Automático!** O sistema de rotas é totalmente automatizado. Basta adicionar a configuração da página no arquivo `src/config/pages.php` e a rota será criada automaticamente.

## ✨ Sistema de Animações

### Animações Disponíveis

- `fade-in-up` - Aparece de baixo para cima
- `fade-in-left` - Aparece da esquerda
- `fade-in-right` - Aparece da direita
- `scale-in` - Escala de 0 a 1
- `parallax` - Efeito parallax
- `stagger-children` - Anima filhos em sequência

### Como Usar

```html
<!-- Animação simples -->
<h1 data-animate="fade-in-up">Título Animado</h1>

<!-- Container com animação em sequência -->
<div data-animate="stagger-children">
  <div data-animate-child>Item 1</div>
  <div data-animate-child>Item 2</div>
  <div data-animate-child>Item 3</div>
</div>

<!-- Efeito parallax -->
<div data-animate="parallax">Conteúdo com parallax</div>
```

### Criando Animações Customizadas

Edite o arquivo `src/assets/js/animations.js`:

```javascript
// Adicione novos métodos na classe AnimationSystem
customAnimation(element) {
    gsap.from(element, {
        duration: 1,
        rotation: 360,
        ease: "power2.out"
    });
}
```

## 📧 Sistema de Email

O projeto inclui um sistema de email configurável:

```php
// src/config/email.php
return [
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    'smtp_username' => 'seu-email@gmail.com',
    'smtp_password' => 'sua-senha-app',
    'from_email' => 'contato@seudominio.com',
    'from_name' => 'Nome do Site'
];
```

## 🎨 Customização

### Cores e Tema

Edite `tailwind.config.js` para personalizar cores e tema:

```javascript
module.exports = {
  theme: {
    extend: {
      colors: {
        primary: "#3B82F6",
        secondary: "#10B981",
        // Suas cores customizadas
      },
    },
  },
};
```

### Componentes

Os componentes estão organizados em `src/views/components/`:

- `sections/` - Seções principais
- `ui/` - Componentes de interface
- `layout/` - Layouts base

## 🔧 Scripts Disponíveis

```bash
npm run dev          # Modo desenvolvimento
npm run build        # Build para produção
npm run preview      # Preview do build
npm run lint         # Verificar código
```

## 📱 Responsividade

O template é totalmente responsivo com breakpoints do Tailwind:

- `sm:` - 640px+
- `md:` - 768px+
- `lg:` - 1024px+
- `xl:` - 1280px+
- `2xl:` - 1536px+

## 🚀 Deploy

1. Execute o build: `npm run build`
2. Faça upload dos arquivos para seu servidor
3. Configure o servidor web para apontar para a pasta `public/`
4. Certifique-se de que o PHP está configurado corretamente
