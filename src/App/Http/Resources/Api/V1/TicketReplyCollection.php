<?php

namespace Callmeaf\TicketReply\App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @extends ResourceCollection<TicketReplyResource>
 */
class TicketReplyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, TicketReplyResource>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
