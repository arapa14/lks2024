<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Rent extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'rents';

    protected $fillable = [
        'tenant_id',
        'car_id',
        'date_borrow',
        'date_return',
        'down_payment',
        'discount',
        'total',
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function cars() {
        return $this->belongsTo(Car::class);
    }
}
