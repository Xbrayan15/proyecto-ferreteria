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
}
