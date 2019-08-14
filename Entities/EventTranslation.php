<?php

namespace Modules\Ievent\Entities;

use Illuminate\Database\Eloquent\Model;

class EventTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'ievent__event_translations';
}
