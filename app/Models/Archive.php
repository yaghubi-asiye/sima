<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'type', 'number', 'file', 'meetingDate',
    ];
}
