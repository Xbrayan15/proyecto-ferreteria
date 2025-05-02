<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Si tiene relación con pedidos (orders)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
