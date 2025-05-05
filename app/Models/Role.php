<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 
    ];

    /**
     * Define a one-to-many relationship with the User model.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
