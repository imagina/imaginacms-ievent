<?php

namespace Modules\Ievent\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
  use Translatable;

  protected $table = 'ievent__organizers';

  protected static $entityNamespace = 'ievent/organizer';

  protected $fakeColumns = ['options'];

  public $translatedAttributes = [
    'name',
    'description',
    'slug',
    'meta_title',
    'meta_description',
    'meta_keywords',
    'options_translate'
  ];
  protected $fillable = [
    'contact',
    'address',
    'options',
    'name',
    'description',
    'slug',
    'meta_title',
    'meta_description',
    'meta_keywords',
    'options_translate'
  ];

  protected $casts = [
    'options' => 'array'
  ];

  public function getOptionsAttribute($value)
  {
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
      $config = implode('.', ['asgard.ievent.config.relations.organizer', $method]);

      #i: Relation method resolver
      if (config()->has($config)) {
          $function = config()->get($config);

          return $function($this);
      }

      #i: No relation found, return the call to parent (Eloquent) to handle it.
      return parent::__call($method, $parameters);
  }
}
