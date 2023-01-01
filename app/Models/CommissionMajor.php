<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionMajor extends Model
{
    protected $guarded = [];
    public function confirms() {
        return $this->morphMany('App\Models\Confirm', 'confirmable');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function purchaseRequest()
    {
        return $this->belongsTo('App\Models\PurchaseRequest', 'purchase_requests_id');
    }
}
