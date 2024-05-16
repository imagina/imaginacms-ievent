<?php

namespace Modules\Ievent\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Support\Traits\AuditTrait;

class Comment extends Model
{
    use AuditTrait;

    protected $table = 'ievent__comments';

    protected $fillable = [
        'message',
        'user_id',
        'event_id',
    ];

    public function user()
    {
        $driver = config('asgard.user.config.driver');

        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
    }
}
