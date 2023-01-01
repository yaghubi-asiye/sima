<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dailywork extends Model
{
    protected $fillable = ['time','result','assignment','description','start_time','end_time', 'user_id'];

}
