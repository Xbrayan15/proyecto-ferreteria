<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'rate',
    ];

    // app/Models/Tax.php

public function products()
{
    return $this->belongsToMany(Product::class);
}

}
