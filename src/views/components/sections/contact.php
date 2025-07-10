<?php

use App\Core\Mailer;

$config = require dirname(__DIR__, 3) . '/config/email.php';
$siteConfig = require dirname(__DIR__, 3) . '/config/site.php';

$feedback = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? 'Contato pelo site');
    $message = nl2br(htmlspecialchars($_POST['message'] ?? ''));

    $mailer = new Mailer();
    $toEmail = $config['to_email'] ?? $config['username'];
    $body = "<p><strong>Nome:</strong> {$name}</p>";
    $body .= "<p><strong>Email:</strong> {$email}</p>";
    $body .= "<p><strong>Assunto:</strong> {$subject}</p>";
    $body .= "<p><strong>Mensagem:</strong><br>{$message}</p>";

    $sent = $mailer->send($toEmail, "Contato: {$subject}", $body, strip_tags($body));

    if ($sent) {
        $feedback = '<div class="p-4 mb-4 text-success bg-success-light rounded-lg transform transition-all duration-300 ease-in-out">Sua mensagem foi enviada com sucesso!</div>';
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
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs>
                <pattern id="circuit" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <path d="M 0 10 L 20 10 M 10 0 L 10 20 M 5 5 L 15 5 M 5 15 L 15 15" stroke="white" stroke-width="0.5" fill="none" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#circuit)" />
        </svg>
    </div>

    <div class="absolute top-20 left-20 w-3 h-3 bg-white/30 rounded-full animate-ping"></div>
    <div class="absolute top-40 right-32 w-2 h-2 bg-white/20 rounded-full animate-ping delay-700"></div>
    <div class="absolute bottom-32 left-1/3 w-4 h-4 bg-white/25 rounded-full animate-ping delay-1000"></div>

    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/10 backdrop-blur-sm text-white text-sm font-medium mb-6 border border-white/20">
                Contato Especializado
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-white mb-8">
                Transforme Sua Ideia em Realidade
            </h2>
            <p class="text-white/80 text-xl max-w-3xl mx-auto leading-relaxed">
                Converse com nossa equipe de especialistas em soldagem a laser. Estamos prontos para converter desafios técnicos em soluções industriais de alta precisão.
            </p>
        </div>

        <div class="grid lg:grid-cols-5 gap-12">
            <?php if (!empty($contactInfo)): ?>
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                        <h3 class="text-2xl font-bold text-white mb-8">Fale Conosco</h3>

                        <div class="space-y-6">
                            <?php foreach ($contactInfo as $info): ?>
                                <a href="<?= $info['link'] ?>" class="block group">
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
                    <div class="bg-white rounded-3xl p-10 shadow-2xl">
                        <h3 class="text-3xl font-bold mb-8 text-neutral-900">
                            Solicite seu Orçamento
                        </h3>

                        <?= $feedback ?>

                        <form method="post" class="space-y-6">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="relative">
                                    <label for="name" class="block text-sm font-medium text-neutral-700 mb-2">Nome Completo</label>
                                    <input type="text" name="name" id="name" required
                                        class="w-full px-4 py-4 border border-neutral-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300 bg-neutral-50"
                                        placeholder="Seu nome completo">
                                </div>

                                <div class="relative">
                                    <label for="email" class="block text-sm font-medium text-neutral-700 mb-2">Email Corporativo</label>
                                    <input type="email" name="email" id="email" required
                                        class="w-full px-4 py-4 border border-neutral-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300 bg-neutral-50"
                                        placeholder="seu@empresa.com">
                                </div>
                            </div>

                            <div class="relative">
                                <label for="subject" class="block text-sm font-medium text-neutral-700 mb-2">Tipo de Projeto</label>
                                <select name="subject" id="subject" required
                                    class="w-full px-4 py-4 border border-neutral-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300 bg-neutral-50">
                                    <option value="">Selecione o tipo de projeto</option>
                                    <option value="Soldagem a Laser">Soldagem a Laser</option>
                                    <option value="Soldagem MIG">Soldagem MIG</option>
                                    <option value="Soldagem TIG">Soldagem TIG</option>
                                    <option value="Eletrodo Revestido">Eletrodo Revestido</option>
                                    <option value="Brasagem">Brasagem</option>
                                    <option value="Punções e Matrizes">Punções e Matrizes</option>
                                    <option value="Consulta Técnica">Consulta Técnica</option>
                                </select>
                            </div>

                            <div class="relative">
                                <label for="message" class="block text-sm font-medium text-neutral-700 mb-2">Detalhes do Projeto</label>
                                <textarea name="message" id="message" rows="6" required
                                    class="w-full px-4 py-4 border border-neutral-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300 bg-neutral-50"
                                    placeholder="Descreva os detalhes técnicos do seu projeto, materiais envolvidos, especificações e prazo desejado..."></textarea>
                            </div>

                            <div class="flex justify-end">
                                <?= $this->insert('components/ui/button', [
                                    'text' => 'Enviar Solicitação',
                                    'type' => 'submit',
                                    'variant' => 'primary',
                                    'size' => 'lg',
                                    'attributes' => [
                                        'class' => 'w-full md:w-auto px-8'
                                    ]
                                ]) ?>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
        </div>
</section>