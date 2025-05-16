<?php

namespace Callmeaf\TicketReply\App\Models;

use Callmeaf\Base\App\Models\BaseModel;
use Callmeaf\Base\App\Models\Contracts\HasMedia;
use Callmeaf\Base\App\Traits\Model\HasDate;
use Callmeaf\Base\App\Traits\Model\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketReply extends BaseModel implements HasMedia
{
    use HasDate,InteractsWithMedia;

    protected $fillable = [
        'ticket_ref_code',
        'sender_identifier',
        'content',
    ];

    public static function configKey(): string
    {
        return 'callmeaf-ticket-reply';
    }

    protected function casts(): array
    {
        return [
            ...(self::config()['enums'] ?? []),
        ];
    }

    public function attachments(): MorphMany
    {
        return $this->media()->where('collection_name',$this->mediaCollectionName());
    }

    public function mediaCollectionName(): string
    {
        return 'attachments';
    }

    public function mediaDiskName(): string
    {
        return 'ticket_replies';
    }
}
