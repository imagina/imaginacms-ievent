<?php

namespace Modules\Ievent\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'title',
      'description',
      'slug',
      'meta_title',
      'meta_description',
      'meta_keywords',
      'options_translate'
    ];
    protected $table = 'ievent__category_translations';

    protected  $casts = [
        'options_translate'=>'array'
    ];
    public function getOptionsTranslateAttribute($value){
        return json_decode($value);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @return mixed
     */
    public function getMetaTitleAttribute(){

        return $this->meta_title ?? $this->title;
    }
    public function getMetaDescriptionAttribute(){

        return $this->meta_description ?? substr(strip_tags($this->description??''),0,150);
    }
    public function getUrlAttribute() {

        return url($this->slug);

    }

}
