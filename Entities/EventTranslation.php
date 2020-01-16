<?php

namespace Modules\Ievent\Entities;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class EventTranslation extends Model
{

    use Sluggable;

    public $timestamps = false;

    protected $fillable = [
      'summary',
      'title',
      'description',
      'slug',
      'meta_title',
      'meta_description',
      'meta_keywords',
      'options_translate'
    ];

    protected $table = 'ievent__event_translations';

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
