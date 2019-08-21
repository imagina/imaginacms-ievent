<?php

namespace Modules\Ievent\Repositories\Cache;

use Modules\Ievent\Repositories\UserRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheUserDecorator extends BaseCacheDecorator implements UserRepository
{
  public function __construct(UserRepository $userapi)
  {
    parent::__construct();
    $this->entityName = 'ievent.userapis';
    $this->repository = $userapi;
  }

  public function getItemsBy($params)
  {
    return $this->remember(function () use ($params) {
      return $this->repository->getItemsBy($params);
    });
  }
}
