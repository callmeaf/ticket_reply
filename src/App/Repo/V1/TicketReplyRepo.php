<?php

namespace Callmeaf\TicketReply\App\Repo\V1;

use Callmeaf\Base\App\Repo\V1\BaseRepo;
use Callmeaf\TicketReply\App\Http\Resources\Api\V1\TicketReplyResource;
use Callmeaf\TicketReply\App\Repo\Contracts\TicketReplyRepoInterface;

class TicketReplyRepo extends BaseRepo implements TicketReplyRepoInterface
{
    public function create(array $data)
    {
        /**
         * @var TicketReplyResource $ticketReply
         */
        $ticketReply = parent::create($data);

        $attachments = $data['attachments'] ?? [];

        if(! empty ($attachments)) {
            $this->addMultiMedia($ticketReply,$data['attachments']);
        }

        return $this->toResource($ticketReply->resource->loadMissing([
            'attachments'
        ]));
    }

    public function update(mixed $id, array $data)
    {
        /**
         * @var TicketReplyResource $ticketReply
         */
        $ticketReply = parent::update(id: $id,data: $data);

        $attachments = $data['attachments'] ?? [];

        if(! empty($attachments)) {
            $this->addMultiMedia($ticketReply,$data['attachments']);
        }

        return $this->toResource($ticketReply->resource->loadMissing([
            'attachments'
        ]));
    }

}
