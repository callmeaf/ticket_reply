<?php

namespace Callmeaf\TicketReply\App\Models;

use Callmeaf\Base\App\Models\BaseModel;
use Callmeaf\Base\App\Models\Contracts\HasMedia;
use Callmeaf\Base\App\Traits\Model\HasDate;
use Callmeaf\Log\App\Traits\LogsActivity;
use Callmeaf\Media\App\Traits\InteractsWithMedia;
use Callmeaf\Ticket\App\Repo\Contracts\TicketRepoInterface;
use Callmeaf\User\App\Repo\Contracts\UserRepoInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;

class TicketReply extends BaseModel implements HasMedia
{
    use HasDate,InteractsWithMedia,LogsActivity;

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

    public function ticket(): BelongsTo
    {
        /**
         * @var TicketRepoInterface $ticketRepo
         */
        $ticketRepo = app(TicketRepoInterface::class);
        return $this->belongsTo($ticketRepo->getModel()::class,'ticket_ref_code');
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

    public function sender(): BelongsTo
    {
        /**
         * @var UserRepoInterface $userRepo
         */
        $userRepo = app(UserRepoInterface::class);
        return $this->belongsTo($userRepo->getModel()::class,'sender_identifier',$userRepo->getModel()->getRouteKeyName());
    }

    public function senderIsSuperAdminOrAdmin(): bool
    {
        return userIsSuperAdmin(user: $this->sender) || userIsAdmin(user: $this->sender);
    }

    public function senderIsUser(): bool
    {
        return userIsUser(user: $this->sender);
    }

    public function isCreatedBy($user = null): bool
    {
        $user ??= Auth::user();
        if(! $user) {
            return false;
        }
        return $user->getRouteKey() === $this->sender_identifier;
    }
}
