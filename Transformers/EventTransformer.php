<?php

namespace Modules\Ievent\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class EventTransformer extends Resource
{
  public function toArray($request)
  {
    $data = [
      'id' => $this->id,
      'startDate' => $this->when( $this->start_date, $this->start_date ),
      'endDate' => $this->when( $this->end_date, $this->end_date ),
      'repeat' => $this->when( $this->repeat, $this->repeat ),
      'allDay' => $this->when( $this->all_day, $this->all_day ),
      'address' => $this->when( $this->address, $this->address ),
      'lgt' => $this->when( $this->lgt, $this->lgt ),
      'lat' => $this->when( $this->lat, $this->lat ),
      'price' => $this->when( $this->price, $this->price ),
      'organizerId' => $this->when( $this->organizer_id, $this->organizer_id ),
      'status' => $this->when( $this->status, $this->status ),
      'options' => $this->when( $this->options, $this->options ),
      'userId' => $this->when( $this->user_id, $this->user_id ),

    ];
    $filter = json_decode($request->filter);
    // Return data with available translations
    if (isset($filter->allTranslations) && $filter->allTranslations) {
      // Get langs avaliables
      $languages = \LaravelLocalization::getSupportedLocales();
      foreach ($languages as $lang => $value) {
        $data[$lang]['summary'] = $this->hasTranslation($lang) ? $this->translate("$lang")['summary'] : '';
        $data[$lang]['title'] = $this->hasTranslation($lang) ? $this->translate("$lang")['title'] : '';
        $data[$lang]['description'] = $this->hasTranslation($lang) ? $this->translate("$lang")['description'] : '';
        $data[$lang]['slug'] = $this->hasTranslation($lang) ? $this->translate("$lang")['slug'] : '';
        $data[$lang]['metaTitle'] = $this->hasTranslation($lang) ? $this->translate("$lang")['meta_title'] : '';
        $data[$lang]['metaDescription'] = $this->hasTranslation($lang) ? $this->translate("$lang")['meta_description'] : '';
        $data[$lang]['metaKeywords'] = $this->hasTranslation($lang) ? $this->translate("$lang")['meta_keywords'] : '';
      }
    }
    return $data;
  }
}
