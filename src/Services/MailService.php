<?php

namespace ScriptingThoughts\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService {
    private PHPMailer $mailer;
    private array $config;

    public function __construct(array $config = []) {
        $this->config = array_merge([
            'host' => $_ENV['MAIL_HOST'] ?? '',
            'port' => $_ENV['MAIL_PORT'] ?? 587,
            'username' => $_ENV['MAIL_USERNAME'] ?? '',
            'password' => $_ENV['MAIL_PASSWORD'] ?? '',
            'encryption' => $_ENV['MAIL_ENCRYPTION'] ?? 'tls',
            'from_address' => $_ENV['MAIL_FROM_ADDRESS'] ?? '',
            'from_name' => $_ENV['MAIL_FROM_NAME'] ?? ''
        ], $config);

        $this->initializeMailer();
    }

    private function initializeMailer(): void {
        $this->mailer = new PHPMailer(true);

        try {
            // Server settings
            $this->mailer->isSMTP();
            $this->mailer->Host = $this->config['host'];
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = $this->config['username'];
            $this->mailer->Password = $this->config['password'];
            $this->mailer->SMTPSecure = $this->config['encryption'];
            $this->mailer->Port = $this->config['port'];

            // Default sender
            $this->mailer->setFrom(
                $this->config['from_address'],
                $this->config['from_name']
            );
        } catch (Exception $e) {
            throw new Exception("Mail configuration error: " . $e->getMessage());
        }
    }

    public function send(
        string|array $to,
        string $subject,
        string $body,
        array $attachments = [],
        bool $isHtml = true
    ): bool {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->clearAttachments();

            // Add recipients
            if (is_array($to)) {
                foreach ($to as $recipient) {
                    $this->mailer->addAddress($recipient);
                }
            } else {
                $this->mailer->addAddress($to);
            }

            // Email content
            $this->mailer->isHTML($isHtml);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            // Add attachments
            foreach ($attachments as $attachment) {
                if (is_array($attachment)) {
                    $this->mailer->addAttachment(
                        $attachment['path'],
                        $attachment['name'] ?? ''
                    );
                } else {
                    $this->mailer->addAttachment($attachment);
                }
            }

            return $this->mailer->send();
        } catch (Exception $e) {
            throw new Exception("Failed to send email: " . $e->getMessage());
        }
    }

    // Helper method for sending simple text emails
    public function sendText(
        string|array $to,
        string $subject,
        string $body
    ): bool {
        return $this->send($to, $subject, $body, [], false);
    }

    // Get the underlying PHPMailer instance for advanced configuration
    public function getMailer(): PHPMailer {
        return $this->mailer;
    }
}