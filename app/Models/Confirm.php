<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
    protected $guarded = [];
    public function confirmable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
