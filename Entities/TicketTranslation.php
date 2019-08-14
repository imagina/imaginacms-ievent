<?php

namespace Modules\Ievent\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'ievent__ticket_translations';
}
