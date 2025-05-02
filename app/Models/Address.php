<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'calle',
        'barrio',
        'ciudad',
        'departamento',
        'codigo_postal',
        'pais',
    ];

    // Relación: una dirección pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
