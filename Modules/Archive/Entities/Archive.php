<?php

namespace Modules\Archive\Entities;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'type', 'number', 'file', 'meetingDate',
    ];
}
