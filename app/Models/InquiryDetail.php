<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InquiryDetail extends Model
{
    protected $guarded = [];

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class, 'inquiry_id');
    }

}
