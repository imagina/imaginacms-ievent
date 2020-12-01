<?php

namespace Modules\Ievent\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class EventTransformer extends JsonResource
{
  public function toArray($request)
  {
    $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();
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
      'status' => $this->status,
      'options' => $this->when( $this->options, $this->options ),
      'userId' => $this->when( $this->user_id, $this->user_id ),
      'summary' => $this->when( $this->summary, $this->summary ),
      'title' => $this->when( $this->title, $this->title ),
      'description' => $this->when( $this->description, $this->description ),
      'slug' => $this->when( $this->slug, $this->slug ),
      'categories' => CategoryTransformer::collection($this->whenLoaded('categories')),
      'mainImage' => $this->mainImage,
      'gallery' => $this->gallery,

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
