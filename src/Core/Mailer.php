<?php

namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    private PHPMailer $mailer;
    private array $config;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../config/email.php';
        $this->initializeMailer();
    }

    private function initializeMailer(): void
    {
        $this->mailer = new PHPMailer(true);

        try {
            // Configurações SMTP
            $this->mailer->isSMTP();
            $this->mailer->Host       = $this->config['smtp']['host'];
            $this->mailer->SMTPAuth   = true;
            $this->mailer->Username   = $this->config['smtp']['username'];
            $this->mailer->Password   = $this->config['smtp']['password'];
            $this->mailer->SMTPSecure = $this->config['smtp']['encryption'];
            $this->mailer->Port       = $this->config['smtp']['port'];

            // Configurações gerais
            $this->mailer->SMTPDebug  = $this->config['settings']['debug'] ? 2 : 0;
            $this->mailer->Timeout    = $this->config['settings']['timeout'];
            $this->mailer->CharSet    = $this->config['settings']['charset'];

            // Remetente
            $this->mailer->setFrom(
                $this->config['from']['email'],
                $this->config['from']['name']
            );

            // Reply-To (opcional)
            if (!empty($this->config['reply_to']['email'])) {
                $this->mailer->addReplyTo(
                    $this->config['reply_to']['email'],
                    $this->config['reply_to']['name'] ?? ''
                );
            }
        } catch (Exception $e) {
            error_log('Mailer init error: ' . $e->getMessage());
        }
    }

    /**
     * Envia email para o destinatário de teste
     */
    public function sendToTest(string $subject, string $body, string $altBody = null): bool
    {
        if (!$this->config['test']['enabled']) {
            error_log('Test emails are disabled');
            return false;
        }

        return $this->send(
            $this->config['test']['email'],
            $this->config['test']['name'],
            $subject,
            $body,
            $altBody
        );
    }

    /**
     * Envia email para o cliente principal
     */
    public function sendToClient(string $subject, string $body, string $altBody = null): bool
    {
        if (!$this->config['client']['enabled']) {
            error_log('Client emails are disabled');
            return false;
        }

        return $this->send(
            $this->config['client']['email'],
            $this->config['client']['name'],
            $subject,
            $body,
            $altBody
        );
    }

    /**
     * Envia email para ambos (teste e cliente)
     */
    public function sendToBoth(string $subject, string $body, string $altBody = null): array
    {
        $results = [
            'test' => false,
            'client' => false
        ];

        if ($this->config['test']['enabled']) {
            $results['test'] = $this->sendToTest($subject, $body, $altBody);
        }

        if ($this->config['client']['enabled']) {
            $results['client'] = $this->sendToClient($subject, $body, $altBody);
        }

        return $results;
    }

    /**
     * Envia email para destinatário personalizado
     */
    public function sendToCustom(string $email, string $name, string $subject, string $body, string $altBody = null): bool
    {
        return $this->send($email, $name, $subject, $body, $altBody);
    }

    /**
     * Método principal para envio de emails
     */
    private function send(string $email, string $name, string $subject, string $body, string $altBody = null): bool
    {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($email, $name);

            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body    = $body;

            if ($altBody !== null) {
                $this->mailer->AltBody = $altBody;
            }

            return $this->mailer->send();
        } catch (Exception $e) {
            error_log('Mail send error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Testa a conexão SMTP
     */
    public function testConnection(): bool
    {
        try {
            return $this->mailer->smtpConnect();
        } catch (Exception $e) {
            error_log('SMTP connection test failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Retorna as configurações atuais
     */
    public function getConfig(): array
    {
        return $this->config;
    }
}
