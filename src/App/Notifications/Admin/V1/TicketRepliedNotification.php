<?php

namespace Callmeaf\TicketReply\App\Notifications\Admin\V1;

use Callmeaf\Ticket\App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketRepliedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     * @var Ticket $ticket
     */
    public function __construct(public $ticket)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Determine which queues should be used for each notification channel.
     *
     * @return array<string, string>
     */
    public function viaQueues(): array
    {
        return [
            'mail' => 'notifications',
        ];
    }

    /**
     * Determine which connections should be used for each notification channel.
     *
     * @return array<string, string>
     */
    public function viaConnections(): array
    {
        return [
            'database' => 'sync',
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)->subject(__('callmeaf-ticket-reply::admin_v1.mail.replied.subject',[
            'ref_code' => $this->ticket->ref_code,
        ]))->markdown('callmeaf-ticket-reply::admin.v1.mail.ticket_replies.replied',[
            'url' => explode(',',config('app.frontend_url'))[0],
            'ref_code' => $this->ticket->ref_code,
            'title' => $this->ticket->title,
            'receiver_identifier' => $this->ticket->receiver_identifier,
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "subject" => __('callmeaf-ticket-reply::admin_v1.mail.replied.notification_subject'),
            'payload' => __('callmeaf-ticket-reply::admin_v1.mail.replied.notification_payload',[
                'title' => $this->ticket->title,
                'ref_code' => $this->ticket->ref_code,
                'receiver_identifier' => $this->ticket->receiver_identifier,
            ]),
        ];
    }
}
