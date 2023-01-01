<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $fillable = ['name','description','contractor','from','to','file', 'created_at', 'updated_at', 'status'];
    public function commissionMajors(){
        return $this->hasMany('App\Models\CommissionMajor');
    }
    public function CommissionMedium(){
        return $this->hasMany('App\Models\CommissionMajor');
    }
    public function commissionPartials(){
        return $this->hasMany('App\Models\CommissionPartial');
    }

}

