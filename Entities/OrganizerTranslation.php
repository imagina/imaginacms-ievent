<?php

namespace Modules\Ievent\Entities;

use Illuminate\Database\Eloquent\Model;

class OrganizerTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'name',
      'description',
      'slug',
      'meta_title',
      'meta_description',
      'meta_keywords',
      'options_translate'
    ];

    protected $table = 'ievent__organizer_translations';
}
