<?php

namespace Modules\Ievent\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use Translatable;

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
