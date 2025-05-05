<?php

// app/Models/CartItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopping_cart_id',
        'product_id',
        'quantity',
    ];

    // Relaciones
    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
