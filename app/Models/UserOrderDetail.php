<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrderDetail extends Model
{
    protected $fillable = [
        'user_id',
        'shipping_address',
        'postal_code',
        'city',
        'province',
        'country',
        'payment_method',
        'phone_number',
        'card_number',
        'expiry_date',
        'cvv',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
