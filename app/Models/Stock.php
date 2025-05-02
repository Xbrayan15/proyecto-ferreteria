<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // Especificamos los campos que pueden ser asignados masivamente
    protected $fillable = ['cantidad'];
}
