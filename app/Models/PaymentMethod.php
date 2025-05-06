<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    // Asegúrate de que solo estos campos sean asignables masivamente
    protected $fillable = [
        'name', // Nombre del método de pago
        'user_id', // ID del usuario
    ];

    /**
     * Relación: Un método de pago pertenece a un usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Cada método de pago pertenece a un usuario
    }
}
