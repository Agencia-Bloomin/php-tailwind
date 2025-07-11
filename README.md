# Template PHP + Tailwind + GSAP

Este projeto é um template moderno utilizando PHP, Tailwind CSS, Vite e GSAP para animações.

## Como rodar o template

1. **Pré-requisitos:**

   - PHP 8+
   - Node.js 16+
   - Composer

2. **Instale as dependências:**

   ```bash
   npm install
   composer install
   ```

3. **Rodando em modo desenvolvimento:**

   ```bash
   npm run dev
   ```

   - Isso irá iniciar o servidor PHP em `localhost:8000` e o Vite em `localhost:5173`.

4. **Build para produção:**
   ```bash
   npm run build
   ```
   - Os arquivos finais serão gerados na pasta `public/assets` (verifique se ela existe ou crie-a).

---

## Como criar uma nova página

1. Crie um novo arquivo PHP em `src/views/` (ex: `nova-pagina.php`).
2. Use o layout base:

   ```php
   <?php $this->layout('layout/base', [
     'title' => 'Título da Página',
     'description' => 'Descrição da página',
   ]); ?>

   <section>
     <h1>Minha Nova Página</h1>
   </section>
   ```

3. Adicione a rota correspondente no seu sistema de rotas (ex: `router.php`).

---

## Como criar uma animação com GSAP

1. Adicione o atributo `data-animate` ao elemento que deseja animar. Exemplos:
   ```html
   <h1 data-animate="fade-in-up">Título animado</h1>
   <div data-animate="fade-in-left">Conteúdo animado</div>
   <div data-animate="scale-in">Outro conteúdo</div>
   ```
2. Os tipos de animação disponíveis são:

   - `fade-in-up`
   - `fade-in-left`
   - `fade-in-right`
   - `scale-in`
   - `parallax`
   - `stagger-children` (para containers)
   - `data-animate-child` (para filhos de um container com stagger)

3. Exemplo real:

   ```php
   <h1 data-animate="fade-in-up">Bem-vindo ao site</h1>
   <div data-animate="stagger-children">
     <a data-animate-child>Botão 1</a>
     <a data-animate-child>Botão 2</a>
   </div>
   ```

4. O sistema de animações já está configurado em `src/assets/js/animations.js` e é carregado automaticamente.

5. Para criar animações customizadas, edite ou adicione métodos na classe `AnimationSystem` em `src/assets/js/animations.js`.

---
