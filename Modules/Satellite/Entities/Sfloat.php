<?php

namespace Modules\Satellite\Entities;

use Illuminate\Database\Eloquent\Model;

class Sfloat extends Model
{
    protected $guarded = [];
    public function parent()
    {
        return $this->hasMany($this, 'parent_id');
    }
}
