<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // Especificamos qué campos se pueden llenar de manera masiva
    protected $fillable = ['nombre'];
}
