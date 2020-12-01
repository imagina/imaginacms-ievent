<?php

namespace Modules\Ievent\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryTransformer extends JsonResource
{
  public function toArray($request)
  {
    $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();
    $data = [
      'id' => $this->id,
      'parentId' => $this->when($this->parent_id, $this->parent_id),
      'options' => $this->when($this->options, $this->options),
      'title' => $this->hasTranslation($locale) ? $this->translate("$locale")['title'] : '',
    ];
    $filter = json_decode($request->filter);
    // Return data with available translations
    if (isset($filter->allTranslations) && $filter->allTranslations) {
      // Get langs avaliables
      $languages = \LaravelLocalization::getSupportedLocales();
      foreach ($languages as $lang => $value) {
        $data[$lang]['title'] = $this->hasTranslation($lang) ? $this->translate("$lang")['title'] : '';
        $data[$lang]['description'] = $this->hasTranslation($lang) ? $this->translate("$lang")['description'] : '';
        $data[$lang]['slug'] = $this->hasTranslation($lang) ? $this->translate("$lang")['slug'] : '';
        $data[$lang]['metaTitle'] = $this->hasTranslation($lang) ? $this->translate("$lang")['meta_title'] : '';
        $data[$lang]['metaDescription'] = $this->hasTranslation($lang) ? $this->translate("$lang")['meta_description'] : '';
        $data[$lang]['metaKeywords'] = $this->hasTranslation($lang) ? $this->translate("$lang")['meta_keywords'] : '';
        $data[$lang]['optionsTranslate'] = $this->hasTranslation($lang) ? $this->translate("$lang")['options_translate'] : '';
      }
    }
    return $data;
  }
}
