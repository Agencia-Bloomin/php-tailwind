<?php

namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    private PHPMailer $mailer;

    public function __construct()
    {
        $config = require __DIR__ . '/../config/email.php';

        $this->mailer = new PHPMailer(true);

        try {
            $this->mailer->isSMTP();
            $this->mailer->Host       = $config['host'];
            $this->mailer->SMTPAuth   = true;
            $this->mailer->Username   = $config['username'];
            $this->mailer->Password   = $config['password'];
            $this->mailer->SMTPSecure = $config['encryption'];
            $this->mailer->Port       = $config['port'];

            $this->mailer->setFrom(
                $config['from_email'],
                $config['from_name']
            );

            if (!empty($config['reply_to_email'] ?? null)) {
                $this->mailer->addReplyTo(
                    $config['reply_to_email'],
                    $config['reply_to_name'] ?? ''
                );
            }

        } catch (Exception $e) {
            error_log('Mailer init error: ' . $e->getMessage());
        }
    }

    /**
     * Send an email
     *
     * @param string $to Recipient email address
     * @param string $subject Email subject
     * @param string $body HTML body content
     * @param string|null $altBody Optional plain-text body
     * @return bool True on success, false on failure
     */
    public function send(
        string $to,
        string $subject,
        string $body,
        string $altBody = null
    ): bool {
        try {
            $this->mailer->clearAddresses();

            $this->mailer->addAddress($to);

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
} 