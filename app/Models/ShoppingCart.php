<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    /**
     * Relación con el usuario propietario del carrito.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con los ítems del carrito.
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    
    
}
