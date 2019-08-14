<?php

namespace Modules\Ievent\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use Translatable;

    protected $table = 'ievent__organizers';
    public $translatedAttributes = [];
    protected $fillable = [];

    /**
     * Magic Method modification to allow dynamic relations to other entities.
     * @var $value
     * @var $destination_path
     * @return string
     */
    public function __call($method, $parameters)
    {
        #i: Convert array to dot notation
        $config = implode('.', ['asgard.ievent.config.relations.organizer', $method]);

        #i: Relation method resolver
        if (config()->has($config)) {
            $function = config()->get($config);

            return $function($this);
        }

        #i: No relation found, return the call to parent (Eloquent) to handle it.
        return parent::__call($method, $parameters);
    }
}
