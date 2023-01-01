<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    protected $fillable = [
        'title', 'file', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
