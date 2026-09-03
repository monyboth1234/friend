<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = [
        'customer_name', 
        'customer_email', 
        'category', 
        'item_name', 
        'quantity', 
        'total_price'
    ];
}
