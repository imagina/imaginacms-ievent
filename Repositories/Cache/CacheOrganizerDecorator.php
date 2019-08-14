<?php

namespace Modules\Ievent\Repositories\Cache;

use Modules\Ievent\Repositories\OrganizerRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheOrganizerDecorator extends BaseCacheDecorator implements OrganizerRepository
{
    public function __construct(OrganizerRepository $organizer)
    {
        parent::__construct();
        $this->entityName = 'ievent.organizers';
        $this->repository = $organizer;
    }
}
