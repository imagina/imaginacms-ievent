<?php

namespace Modules\Ievent\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface UserRepository extends BaseRepository
{
  public function getItemsBy($params);

}
