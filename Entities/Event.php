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
    $images = Storage::disk('publicmedia')->files('assets/iblog/post/gallery/' . $this->id);
    if (count($images)) {
      $response = array();
      foreach ($images as $image) {
        $response = ["mimetype" => "image/jpeg", "path" => $image];
      }
    } else {
      $gallery = $this->filesByZone('gallery')->get();
      $response = [];
      foreach ($gallery as $img) {
        array_push($response, [
          'mimeType' => $img->mimetype,
          'path' => $img->path_string
        ]);
      }
    }
    return json_decode(json_encode($response));
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
