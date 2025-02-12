<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Penaltie extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'penalties';

    protected $fillable = [
        'penalties_name',
        'description',
        'car_id',
        'penalties_total',
    ];

    public function cars() {
        return $this->belongsTo(Car::class);
    }
}
