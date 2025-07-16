<?php

use App\Core\Mailer;

$config = require dirname(__DIR__, 3) . '/config/email.php';
$siteConfig = require dirname(__DIR__, 3) . '/config/site.php';
$whatsappNumber = $siteConfig['whatsapp']['number'] ?? '';
$hasWhatsapp = !empty($whatsappNumber);

$feedback = '';

// Verificar se o email foi enviado com sucesso
if (isset($_GET['success']) && $_GET['success'] === '1') {
    $feedback = '<div class="p-4 mb-4 text-success bg-success-light rounded-lg transform transition-all duration-300 ease-in-out">Sua mensagem foi enviada com sucesso!</div>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $tel = htmlspecialchars($_POST['telefone'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? 'Contato pelo site');
    $message = nl2br(htmlspecialchars($_POST['message'] ?? ''));

    $mailer = new Mailer();
    $body = "<p><strong>Nome:</strong> {$name}</p>";
    $body .= "<p><strong>Email:</strong> {$email}</p>";
    $body .= "<p><strong>Telefone:</strong> {$tel}</p>";
    $body .= "<p><strong>Assunto:</strong> {$subject}</p>";
    $body .= "<p><strong>Mensagem:</strong><br>{$message}</p>";

    // Enviar para ambos (teste e cliente) se estiverem habilitados
    $results = $mailer->sendToBoth("Contato: {$subject}", $body, strip_tags($body));
    $sent = $results['test'] || $results['client'];

    if ($sent) {
        // Redirecionar para evitar reenvio ao recarregar
        header('Location: ' . $_SERVER['REQUEST_URI'] . '?success=1');
        exit;
    } else {
        $feedback = '<div class="p-4 mb-4 text-error bg-error-light rounded-lg transform transition-all duration-300 ease-in-out">Houve um erro ao enviar sua mensagem. Tente novamente mais tarde.</div>';
    }
}

$contactInfo = [];

// Adicionar WhatsApp apenas se estiver configurado
if (!empty($siteConfig['whatsapp']['number'])) {
    $contactInfo[] = [
        'icon' => 'heroicons:device-phone-mobile',
        'title' => 'WhatsApp Técnico',
        'content' => $siteConfig['whatsapp']['display'],
        'link' => 'https://wa.me/' . $siteConfig['whatsapp']['number'],
        'description' => 'Atendimento direto com nossa equipe'
    ];
}

// Adicionar email apenas se estiver configurado
if (!empty($siteConfig['email']['primary'])) {
    $contactInfo[] = [
        'icon' => 'heroicons:envelope',
        'title' => 'Email Corporativo',
        'content' => $siteConfig['email']['primary'],
        'link' => 'mailto:' . $siteConfig['email']['primary'],
        'description' => 'Orçamentos e consultas técnicas'
    ];
}

// Adicionar endereço apenas se estiver configurado
if (!empty($siteConfig['address']['city']) && !empty($siteConfig['address']['state'])) {
    $contactInfo[] = [
        'icon' => 'heroicons:map-pin',
        'title' => 'Localização',
        'content' => $siteConfig['address']['city'] . ' - ' . $siteConfig['address']['state'],
        'link' => '#',
        'description' => 'Visite nossa unidade industrial'
    ];
}
?>

<section id="contato" class="contact-section py-32 bg-primary relative overflow-hidden">
    <!-- Novo efeito de fundo: gradiente fluido com shapes -->
    <div class="absolute inset-0 z-0">
        <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-gradient-to-br from-primary2/40 to-primary/80 rounded-full blur-3xl opacity-60"></div>
        <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-gradient-to-tr from-primary/30 to-primary2/60 rounded-full blur-2xl opacity-50"></div>
        <div class="absolute top-1/2 left-1/2 w-[200px] h-[200px] bg-white/10 rounded-full blur-xl opacity-30 -translate-x-1/2 -translate-y-1/2"></div>
    </div>

    <div class="absolute top-20 left-20 w-3 h-3 bg-white/30 rounded-full animate-ping"></div>
    <div class="absolute top-40 right-32 w-2 h-2 bg-white/20 rounded-full animate-ping delay-700"></div>
    <div class="absolute bottom-32 left-1/3 w-4 h-4 bg-white/25 rounded-full animate-ping delay-1000"></div>

    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/10 backdrop-blur-sm text-white text-sm font-medium mb-6 border border-white/20">
                Contato Especializado
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-white tracking-tight mb-6 drop-shadow-lg">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit
            </h2>
            <p class="text-xl text-primary4 max-w-3xl mx-auto leading-relaxed drop-shadow-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque euismod, urna eu tincidunt consectetur, nisi nisl aliquam nunc, eget aliquam nisl nisi euismod nunc.
            </p>
        </div>

        <div class="grid lg:grid-cols-5 gap-12">
            <?php if (!empty($contactInfo)): ?>
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                        <h3 class="text-2xl font-bold text-white mb-8">Fale Conosco</h3>

                        <div class="space-y-6">
                            <?php foreach ($contactInfo as $info): ?>
                                <a href="<?= $info['link'] ?>"
                                    title="<?= $info['title'] ?>"
                                    class="block group">
                                    <div class="flex items-start space-x-4 p-4 rounded-xl bg-white/5 hover:bg-white/10 transition-all duration-300">
                                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center group-hover:bg-white/30 transition-colors">
                                            <span class="iconify w-6 h-6 text-white" data-icon="<?= $info['icon'] ?>"></span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="text-white font-semibold mb-1"><?= $info['title'] ?></h4>
                                            <p class="text-white/90 font-medium"><?= $info['content'] ?></p>
                                            <p class="text-white/60 text-sm"><?= $info['description'] ?></p>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3">
                <?php else: ?>
                    <div class="lg:col-span-5">
                    <?php endif; ?>
                    <div class="bg-white rounded-3xl p-10 shadow-2xl relative z-10">
                        <h3 class="text-3xl font-bold mb-8 text-primary3">
                            Solicite seu Orçamento
                        </h3>
                        <?= $feedback ?>
                        <form id="contact-form" method="post" class="space-y-6">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="relative">
                                    <label for="name" class="block text-sm font-medium text-primary2 mb-2">Nome Completo</label>
                                    <input type="text" name="name" id="name" required
                                        class="w-full px-4 py-4 border border-neutral-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300 bg-neutral-50"
                                        placeholder="Seu nome completo">
                                </div>
                                <div class="relative">
                                    <label for="email" class="block text-sm font-medium text-primary2 mb-2">E-mail</label>
                                    <input type="email" name="email" id="email" required
                                        class="w-full px-4 py-4 border border-neutral-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300 bg-neutral-50"
                                        placeholder="seu@email.com">
                                </div>
                            </div>
                            <div class="relative">
                                <label for="telefone" class="block text-sm font-medium text-primary2 mb-2">Telefone</label>
                                <input type="tel" name="telefone" id="telefone" required
                                    class="w-full px-4 py-4 border border-neutral-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300 bg-neutral-50"
                                    placeholder="(99) 99999-9999">
                            </div>
                            <div class="relative">
                                <label for="message" class="block text-sm font-medium text-primary2 mb-2">Mensagem</label>
                                <textarea name="message" id="message" rows="6" required
                                    class="w-full px-4 py-4 border border-neutral-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300 bg-neutral-50 resize-none"
                                    placeholder="Descreva sua necessidade..."
                                    autocomplete="off"
                                    spellcheck="true"
                                    wrap="soft"></textarea>
                            </div>
                            <div class="flex items-center gap-6 mt-4">
                                <span class="text-sm text-primary3 font-medium">Enviar via:</span>
                                <div class="flex gap-2" id="contact-toggle" data-whatsapp="<?= $hasWhatsapp ? $whatsappNumber : '' ?>">
                                    <button type="button" class="toggle-btn active flex items-center gap-2 px-4 py-2 rounded-xl border border-primary bg-primary text-white font-semibold transition-all" data-method="email">
                                        <span class="iconify" data-icon="mdi:email-outline"></span> E-mail
                                    </button>
                                    <?php if ($hasWhatsapp): ?>
                                        <button type="button" class="toggle-btn flex items-center gap-2 px-4 py-2 rounded-xl border border-primary text-primary font-semibold transition-all" data-method="whatsapp">
                                            <span class="iconify" data-icon="mdi:whatsapp"></span> WhatsApp
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <button type="submit" id="contact-submit" class="w-full mt-6 flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-primary text-white font-bold text-lg shadow hover:bg-primary2 transition-all">
                                <span class="iconify" data-icon="mdi:email-fast-outline"></span>
                                Enviar por E-mail
                            </button>
                            <div id="contact-feedback" class="hidden mt-4 text-center text-base font-medium"></div>
                        </form>
                    </div>
                    </div>
                </div>
        </div>
</section>