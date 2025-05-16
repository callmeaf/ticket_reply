<?php

namespace Callmeaf\TicketReply\App\Listeners\Admin\V1;

use Callmeaf\Ticket\App\Enums\TicketStatus;
use Callmeaf\Ticket\App\Models\Ticket;
use Callmeaf\TicketReply\App\Events\Admin\V1\TicketReplyCreated;

class ChangeTicketStatusAfterReplyCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TicketReplyCreated $event): void
    {
        $reply = $event->ticketReply;
        /**
         * @var Ticket $ticket
         */
        $ticket = $reply->ticket;
        if($ticket->status == TicketStatus::WAITING_FOR_USER) {
            return;
        }
        $ticket->updateQuietly([
            'status' => TicketStatus::WAITING_FOR_USER->value,
        ]);
    }
}
