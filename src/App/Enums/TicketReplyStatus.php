<?php

namespace Callmeaf\TicketReply\App\Enums;


use Callmeaf\Base\App\Enums\BaseStatus;

enum TicketReplyStatus: string
{
    case ACTIVE = BaseStatus::ACTIVE->value;
    case INACTIVE = BaseStatus::INACTIVE->value;
    case PENDING = BaseStatus::PENDING->value;
}
