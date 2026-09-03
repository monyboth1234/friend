<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arable_land extends Model
{
    protected $table = 'arable_land';

    protected $fillable = [
        'name',
        'area',
        'unit',
        'location',
        'description',
    ];

}
