<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'category_id'];

    // Relación con la tabla categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
