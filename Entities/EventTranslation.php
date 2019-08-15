<?php

namespace Modules\Ievent\Entities;

use Illuminate\Database\Eloquent\Model;

class EventTranslation extends Model
{
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
}
