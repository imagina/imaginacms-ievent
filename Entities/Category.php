<?php

namespace Modules\Ievent\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Core\Traits\NamespacedEntity;
use Modules\Media\Entities\File;
use Modules\Media\Support\Traits\MediaRelation;

class Category extends Model
{
  use Translatable, MediaRelation, PresentableTrait,NamespacedEntity;

  protected $table = 'ievent__categories';

  protected $fakeColumns = ['options'];

  public $translatedAttributes = [
    'title',
    'description',
    'slug',
    'meta_title',
    'meta_description',
    'meta_keywords',
    'options_translate'
  ];
  protected $fillable = [
    'title',
    'description',
    'slug',
    'options_translate',
    'meta_title',
    'meta_description',
    'meta_keywords',
    'parent_id',
    'options'
  ];
  protected  $casts = [
      'options'=>'array'
  ];

  public function parent(){
    return $this->belongsTo(Category::class,'parent_id');
  }

  public function children(){
    return $this->hasMany(Category::class, 'parent_id');
  }

  public function events(){
    return $this->belongsToMany(Event::class,'ievent__category_event');
  }

  public function getOptionsAttribute($value){
    try {
      return json_decode(json_decode($value));
    } catch (\Exception $e) {
      return json_decode($value);
    }
  }

  public function getMainImageAttribute()
    {
        $thumbnail = $this->files()->where('zone', 'mainimage')->first();
        if (!$thumbnail) {
            if (isset($this->options->mainimage)) {
                $image = [
                    'mimeType' => 'image/jpeg',
                    'path' => url($this->options->mainimage)
                ];
            } else {
                $image = [
                    'mimeType' => 'image/jpeg',
                    'path' => url('modules/iblog/img/post/default.jpg')
                ];
            }
        } else {
            $image = [
                'mimeType' => $thumbnail->mimetype,
                'path' => $thumbnail->path_string
            ];
        }
        return json_decode(json_encode($image));

    }

  /**
   * Magic Method modification to allow dynamic relations to other entities.
   * @var $value
   * @var $destination_path
   * @return string
   */
  public function __call($method, $parameters)
  {
    #i: Convert array to dot notation
    $config = implode('.', ['asgard.ivent.config.relations.category', $method]);

    #i: Relation method resolver
    if (config()->has($config)) {
      $function = config()->get($config);

      return $function($this);
    }

    #i: No relation found, return the call to parent (Eloquent) to handle it.
    return parent::__call($method, $parameters);
  }

}
