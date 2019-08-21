<?php

namespace Modules\Ievent\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\Iprofile\Transformers\FieldTransformer;

class BirthdayTransformer extends Resource
{
  public function toArray($request)
  {
    $data = [
      'id' => $this->id,
      'title' => $this->when(($this->first_name && $this->last_name), trim($this->present()->fullname)),
      'smallImage' => isset($mainImage->value) ? 'assets/iprofiles/'.$this->id.'_smallThumb.jpg?'.$this->updated_at : 'modules/iprofile/img/default.jpg',
      'mediumImage' => isset($mainImage->value) ? 'assets/iprofiles/'.$this->id.'_mediumThumb.jpg?'.$this->updated_at : 'modules/iprofile/img/default.jpg',
      'mainImage' => isset($mainImage->value) ? $mainImage->value.'?'.$this->updated_at : 'modules/iprofile/img/default.jpg',
      'fields' => FieldTransformer::collection($this->whenLoaded('fields')),


     // 'startDate' =>
      //'endDate' =>

    ];
    return $data;
  }
}

