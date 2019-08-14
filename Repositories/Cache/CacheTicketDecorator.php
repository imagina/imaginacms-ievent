<?php

namespace Modules\Ievent\Repositories\Cache;

use Modules\Ievent\Repositories\TicketRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTicketDecorator extends BaseCacheDecorator implements TicketRepository
{
    public function __construct(TicketRepository $ticket)
    {
        parent::__construct();
        $this->entityName = 'ievent.tickets';
        $this->repository = $ticket;
    }
}
