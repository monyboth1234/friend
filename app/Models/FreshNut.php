<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreshNut extends Model
{
    use HasFactory;

    protected $table = 'fresh_nuts';

    protected $fillable = [
        'name',
        'price',
        'qty',
        'image',
        'image_public_id',
        'description',
    ];
}
