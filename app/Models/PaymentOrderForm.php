<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentOrderForm extends Model
{
    protected $guarded = [];
    public function PaymentOrderFormable()
    {
        return $this->morphTo();
    }
}
