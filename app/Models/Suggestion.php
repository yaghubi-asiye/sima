<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
  public $fillable = ['description', 'requestedFrom', 'requestedFrom', 'addedByName','addedById', 'scope', 'status', 'attachment', 'doerDescription' ];

}
