<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'phone_book_id', 'phone',
    ];

    public function phoneBook()
    {
        return $this->belongsTo(PhoneBook::class);
    }
}
