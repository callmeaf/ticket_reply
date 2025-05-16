<?php

use Callmeaf\TicketReply\App\Enums\TicketReplyStatus;
use Callmeaf\TicketReply\App\Enums\TicketReplyType;

return [
    TicketReplyStatus::class => [
        TicketReplyStatus::ACTIVE->name => 'Active',
        TicketReplyStatus::INACTIVE->name => 'InActive',
        TicketReplyStatus::PENDING->name => 'Pending',
    ],
    TicketReplyType::class => [
        //
    ],
];
