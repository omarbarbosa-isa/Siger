<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOtpNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected string $otp,
        protected string $type = 'registration'
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $subject = $this->type === 'registration' 
            ? 'Confirmação de Registo - Código OTP' 
            : 'Recuperação de Senha - Código OTP';

        $actionText = $this->type === 'registration'
            ? 'Use o código abaixo para validar a sua conta:'
            : 'Recebemos uma solicitação para redefinir a sua senha. Use o código abaixo:';

        return (new MailMessage)
            ->subject($subject)
            ->greeting('Olá!')
            ->line($actionText)
            ->line("**{$this->otp}**")
            ->line('Este código expira em 10 minutos.')
            ->line('Se não solicitou esta ação, ignore esta mensagem.');
    }
}