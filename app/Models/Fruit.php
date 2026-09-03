<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{

    protected $fillable = [
        'name',
        'price',
        'qty',
        'image',
        'description',
    ];
}
