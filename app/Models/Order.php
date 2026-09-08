<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'customer_city',
        'postal_code',
        'delivery_date',
        'order_notes',
        'category',
        'item_name',
        'quantity',
        'total_price',
    ];

    protected $casts = [
        'delivery_date' => 'date',
        'total_price' => 'decimal:2',
    ];

}
