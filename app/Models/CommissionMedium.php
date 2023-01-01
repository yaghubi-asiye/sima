<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionMedium extends Model
{
    protected $guarded = [];
    public function confirms() {
        return $this->morphMany('App/Confirm' , 'confirmable');
    }
    public function purchaseRequest()
    {
        return $this->belongsTo('App\Models\PurchaseRequest', 'purchase_requests_id');
    }
}
