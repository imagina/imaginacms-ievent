<?php

namespace Modules\Ievent\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface RecurrenceDayRepository extends BaseRepository
{
    public function getItemsBy($params);

    public function getItem($criteria, $params = false);

    public function create($data);

    public function updateBy($criteria, $data, $params = false);

    public function deleteBy($criteria, $params = false);
}
