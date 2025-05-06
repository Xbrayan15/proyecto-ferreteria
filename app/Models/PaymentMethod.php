<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods'; // Nombre de la tabla en la base de datos
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Relación con las órdenes (si aplica).
     * public function orders()
     * {
     *     return $this->hasMany(Order::class);
     * }
     */
}
