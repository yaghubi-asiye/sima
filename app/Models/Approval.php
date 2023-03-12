<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Approval extends Model
{
    protected $guarded = [];

    public function approvalDetails()
    {
        return $this->hasMany(ApprovalDetail::class);
    }
    

}
