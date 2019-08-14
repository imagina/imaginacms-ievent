<?php

namespace Modules\Ievent\Repositories\Cache;

use Modules\Ievent\Repositories\CategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCategoryDecorator extends BaseCacheDecorator implements CategoryRepository
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->entityName = 'ievent.categories';
        $this->repository = $category;
    }
}
