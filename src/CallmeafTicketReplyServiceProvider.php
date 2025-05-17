<?php

namespace Callmeaf\TicketReply;

use Callmeaf\Base\CallmeafServiceProvider;
use Callmeaf\Base\Contracts\ServiceProvider\HasConfig;
use Callmeaf\Base\Contracts\ServiceProvider\HasEvent;
use Callmeaf\Base\Contracts\ServiceProvider\HasLang;
use Callmeaf\Base\Contracts\ServiceProvider\HasMigration;
use Callmeaf\Base\Contracts\ServiceProvider\HasRepo;
use Callmeaf\Base\Contracts\ServiceProvider\HasRoute;
use Callmeaf\Base\Contracts\ServiceProvider\HasView;
use Callmeaf\TicketReply\App\Repo\Contracts\TicketReplyRepoInterface;

class CallmeafTicketReplyServiceProvider extends CallmeafServiceProvider implements HasRepo, HasEvent, HasRoute, HasMigration, HasConfig, HasLang,HasView
{
    protected function serviceKey(): string
    {
        return 'ticket-reply';
    }

    public function repo(): string
    {
        return TicketReplyRepoInterface::class;
    }
}
