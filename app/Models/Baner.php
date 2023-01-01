<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baner extends Model
{
  public $fillable = ['description', 'title', 'status', 'id', 'file' ,'addedByName'];

}
