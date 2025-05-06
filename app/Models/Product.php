<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre', 'descripcion', 'sku', 'precio', 'stock',
        'category_id', 'subcategory_id', 'brand_id', 'tax_id', 'imagen'
    ];

    // Relacionar con otras tablas (Modelos)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function priceHistories()
    {
        return $this->hasMany(ProductPriceHistory::class);
    }
    

    public function taxes()
    {
        return $this->belongsToMany(Tax::class);
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    // Relación con Category
   
}

