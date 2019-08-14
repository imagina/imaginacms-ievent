<?php

namespace Modules\Ievent\Repositories\Cache;

use Modules\Ievent\Repositories\EventRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheEventDecorator extends BaseCacheDecorator implements EventRepository
{
    public function __construct(EventRepository $event)
    {
        parent::__construct();
        $this->entityName = 'ievent.events';
        $this->repository = $event;
    }
}
