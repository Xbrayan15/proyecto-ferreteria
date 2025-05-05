<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'movement_type',
        'description',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Opcional: mutador para mostrar el tipo en mayúsculas
    public function getFormattedTypeAttribute()
    {
        return ucfirst($this->movement_type);
    }

    // Validación de los valores para el tipo de movimiento
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($movement) {
            // Validar que el tipo de movimiento esté en un conjunto permitido
            $validTypes = ['entrada', 'salida'];
            if (!in_array($movement->movement_type, $validTypes)) {
                throw new \InvalidArgumentException('El tipo de movimiento debe ser "entrada" o "salida".');
            }
        });
    }
}