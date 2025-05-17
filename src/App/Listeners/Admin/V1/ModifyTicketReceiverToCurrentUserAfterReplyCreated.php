<?php

namespace Callmeaf\TicketReply\App\Listeners\Admin\V1;

use Callmeaf\Ticket\App\Enums\TicketStatus;
use Callmeaf\Ticket\App\Models\Ticket;
use Callmeaf\TicketReply\App\Events\Admin\V1\TicketReplyCreated;
use Illuminate\Support\Facades\Auth;

class ModifyTicketReceiverToCurrentUserAfterReplyCreated
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

        if($ticket->receiver_identifier) {
           return;
        }

        $ticket->updateQuietly([
            'receiver_identifier' => Auth::user()->getRouteKey(),
        ]);
    }
}
