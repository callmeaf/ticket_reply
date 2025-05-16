<?php

namespace Callmeaf\TicketReply\App\Repo\Contracts;

use Callmeaf\Base\App\Repo\Contracts\BaseRepoInterface;
use Callmeaf\TicketReply\App\Models\TicketReply;
use Callmeaf\TicketReply\App\Http\Resources\Api\V1\TicketReplyCollection;
use Callmeaf\TicketReply\App\Http\Resources\Api\V1\TicketReplyResource;

/**
 * @extends BaseRepoInterface<TicketReply,TicketReplyResource,TicketReplyCollection>
 */
interface TicketReplyRepoInterface extends BaseRepoInterface
{

}
