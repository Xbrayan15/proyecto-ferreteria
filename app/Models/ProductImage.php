<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'url', 'is_main'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function mainImage($productId)
    {
        return self::where('product_id', $productId)->where('is_main', true)->first();
    }
}
