<?php

namespace Modules\Ievent\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  use Translatable;

  protected $table = 'ievent__events';

  public $translatedAttributes = [
    'summary',
    'title',
    'description',
    'slug',
    'meta_title',
    'meta_description',
    'meta_keywords',
  ];

  protected $fillable = [
    'start_date',
    'end_date',
    'repeat',
    'all_day',
    'address',
    'lgt',
    'lat',
    'price',
    'organizer_id',
    'status',
    'options',
    'user_id',
    'summary',
    'title',
    'description',
    'slug',
    'meta_title',
    'meta_description',
    'meta_keywords',
  ];

  public function events(){
    return $this->belongsToMany(Category::class,'ievent_category_event');
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
    $config = implode('.', ['asgard.ivent.config.relations.event', $method]);

    #i: Relation method resolver
    if (config()->has($config)) {
        $function = config()->get($config);

        return $function($this);
    }

    #i: No relation found, return the call to parent (Eloquent) to handle it.
    return parent::__call($method, $parameters);
  }
}
