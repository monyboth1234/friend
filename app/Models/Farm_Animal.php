<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farm_Animal extends Model
{
     protected $fillable = [
        'name',
        'price',
        'qty',
        'image',
        'image_public_id',
        'description',
    ];
}
