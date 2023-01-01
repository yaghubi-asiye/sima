<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionPartial extends Model
{
    protected $guarded = [];
    public function confirms() {
        return $this->morphMany('App/Confirm' , 'confirmable');
    }
    public function purchaseRequest()
    {
        return $this->belongsTo('App\Models\PurchaseRequest', 'purchase_requests_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function PaymentOrderForms() {
        return $this->morphMany('App\Models\PaymentOrderForm', 'PaymentOrderFormable');
    }
    public function PurchaseRequestForms() {
        return $this->morphMany('App\Models\PurchaseRequestForm', 'PurchaseRequestFormable');
    }
}
