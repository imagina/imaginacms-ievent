<?php

namespace Modules\Ievent\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Event extends Model
{
  use Translatable, MediaRelation;

  protected $table = 'ievent__events';

  protected $fakeColumns = ['options'];

  public $translatedAttributes = [
    'summary',
    'title',
    'description',
    'slug',
    'meta_title',
    'meta_description',
    'meta_keywords',
    'options_translate'
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
    'category_id',
    'user_id',

    'summary',
    'title',
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

  public function categories(){
    return $this->belongsToMany(Category::class, 'ievent__category_event');
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function user()
  {
      $driver = config('asgard.user.config.driver');
      return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
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

  public function getGalleryAttribute()
  {
    $gallery = $this->filesByZone('gallery')->get();
    $response = [];
    foreach ($gallery as $img) {
      array_push($response, [
        'mimeType' => $img->mimetype,
        'path' => $img->path_string
      ]);
    }
    return json_decode(json_encode($response));
  }

 
  public function getUrlAttribute()
  {

    if (!isset($this->category->slug)) {
      $this->category = Category::take(1)->get()->first();
    }

    return \URL::route(\LaravelLocalization::getCurrentLocale() . '.ievent.event', [$this->category->slug,$this->slug]);

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
