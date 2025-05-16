<?php

namespace Callmeaf\TicketReply\App\Http\Resources\Api\V1;

use Callmeaf\Media\App\Repo\Contracts\MediaRepoInterface;
use Callmeaf\TicketReply\App\Models\TicketReply;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read TicketReply $resource
 */
class TicketReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /**
         * @var MediaRepoInterface $mediaRepo
         */
        $mediaRepo = app(MediaRepoInterface::class);
        return [
            'id' => $this->id,
            'sender_identifier' => $this->sender_identifier,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'created_at_text' => $this->createdAtText(),
            'updated_at' => $this->updated_at,
            'updated_at_text' => $this->updatedAtText(),
            'attachments' => $mediaRepo->toResourceCollection($this->whenLoaded('attachments'))
        ];
    }
}
