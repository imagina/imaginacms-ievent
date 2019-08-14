<?php

namespace Modules\Ievent\Entities;

use Illuminate\Database\Eloquent\Model;

class OrganizerTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'ievent__organizer_translations';
}
