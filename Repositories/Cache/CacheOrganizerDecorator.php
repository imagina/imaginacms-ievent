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
  /**
   * List or resources
   *
   * @return collection
   */
  public function getItemsBy($params)
  {
    return $this->remember(function () use ($params) {
      return $this->repository->getItemsBy($params);
    });
  }

  /**
   * find a resource by id or slug
   *
   * @return object
   */
  public function getItem($criteria, $params)
  {
    return $this->remember(function () use ($criteria, $params) {
      return $this->repository->getItem($criteria, $params);
    });
  }

  /**
   * create a resource
   *
   * @return mixed
   */
  public function create($data)
  {
    $this->clearCache();

    return $this->repository->create($data);
  }

  /**
   * update a resource
   *
   * @return mixed
   */
  public function updateBy($criteria, $data, $params)
  {
    $this->clearCache();

    return $this->repository->updateBy($criteria, $data, $params);
  }

  /**
   * destroy a resource
   *
   * @return mixed
   */
  public function deleteBy($criteria, $params)
  {
    $this->clearCache();

    return $this->repository->deleteBy($criteria, $params);
  }
}
