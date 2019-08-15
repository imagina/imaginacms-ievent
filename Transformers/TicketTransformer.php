<?php

namespace Modules\Ievent\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class TicketTransformer extends Resource
{
  public function toArray($request)
  {
    $data = [
      'id' => $this->id,
    ];
    $filter = json_decode($request->filter);
    // Return data with available translations
    if (isset($filter->allTranslations) && $filter->allTranslations) {
      // Get langs avaliables
      $languages = \LaravelLocalization::getSupportedLocales();
      foreach ($languages as $lang => $value) {

      }
    }
    return $data;
  }
}
