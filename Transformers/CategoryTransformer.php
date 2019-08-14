<?php

namespace Modules\Ievent\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class CategoryTransformer extends Resource
{
  public function toArray($request)
  {
    $data = [
      'id' => $this->id,
    ];
    return $data;
  }
}
