<?php

namespace Modules\Ievent\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\Sentinel\User;

class Attendant extends Model
{

  protected $table = 'ievent__attendants';
  protected $fillable = [
    'user_id',
    'event_id',
  ];


  public function user()
  {
    $driver = config('asgard.user.config.driver');
    return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User")->with('fields');
  }
}