<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [

        'user_name',

        'rating',

        'comment',

        'product_type',

        'product_id',

        'admin_reply',

        'replied_at',

    ];


    protected $casts = [

        'replied_at' => 'datetime',

    ];
}