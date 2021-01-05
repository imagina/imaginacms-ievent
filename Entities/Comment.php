<?php

namespace Modules\Ievent\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'ievent__comments';
    protected $fillable = [
      'message',
      'user_id',
      'event_id'
    ];

  public function user()
  {
    $driver = config('asgard.user.config.driver');

    return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
  }
}
