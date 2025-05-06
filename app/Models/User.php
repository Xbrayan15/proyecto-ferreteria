<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to a different data type.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the addresses for the user.
     *
     * This method defines the relationship where a user can have many addresses.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    /**
     * Define a belongs-to relationship with the Role model.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    /**
     * Get the shopping cart associated with the user.
     *
     * This method defines the relationship between the user and the shopping cart.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shoppingCart()
    {
        return $this->hasOne(ShoppingCart::class);
    }

    /**
     * Get the orders associated with the user.
     *
     * This method defines the relationship where a user can have many orders.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the reviews written by the user.
     *
     * This method defines the relationship where a user can leave many reviews.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   
     public function productReviews()
     {
         return $this->hasMany(ProductReview::class);
     }
  // En el modelo User
// En el modelo User


public function paymentMethods()
{
    return $this->hasMany(PaymentMethod::class);
}


     
}
