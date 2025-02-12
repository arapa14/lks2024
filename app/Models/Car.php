<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Car extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'cars';

    protected $fillable = [
        'no_car',
        'name_car',
        'type_car',
        'year',
        'seat',
        'image',
        'total',
        'price',
        'status',
    ];
}
