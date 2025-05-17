<?php

namespace Callmeaf\TicketReply\App\Listeners\Admin\V1;

use App\Models\User;
use Callmeaf\Ticket\App\Models\Ticket;
use Callmeaf\TicketReply\App\Events\Admin\V1\TicketReplyCreated;
use Callmeaf\TicketReply\App\Notifications\Admin\V1\TicketRepliedNotification;

class NotifySenderTicketAfterReplyCreated
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
        /**
         * @var User $user
         */
        $sender = $ticket->sender;

        if($sender) {
            $sender->notify(new TicketRepliedNotification($ticket));
        }
    }
}
