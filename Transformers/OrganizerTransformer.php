<?php

namespace Modules\Ievent\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizerTransformer extends JsonResource
{
  public function toArray($request)
  {
    $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

    $data = [
      'id' => $this->id,
      'contact' => $this->when( $this->contact, $this->contact ),
      'address' => $this->when( $this->address, $this->address ),
      'options' => $this->when( $this->options, $this->options ),
      'name' => $this->hasTranslation($locale) ? $this->translate("$locale")['name'] : '',
    ];
    $filter = json_decode($request->filter);
    // Return data with available translations
    if (isset($filter->allTranslations) && $filter->allTranslations) {
      // Get langs avaliables
      $languages = \LaravelLocalization::getSupportedLocales();
      foreach ($languages as $lang => $value) {
        $data[$lang]['name'] = $this->hasTranslation($lang) ? $this->translate("$lang")['name'] : '';
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
