<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'favorite_user');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function paymentCards(): HasMany
    {
        return $this->hasMany(UserPaymentCard::class);
    }

    public function hasFavorite($favorite_id): bool
    {
        return $this->favorites->contains($favorite_id);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function settings(): HasMany
    {
        return $this->hasMany(UserSetting::class, 'user_id', 'id');
    }

    public function booksInCart(): HasMany
    {
        return $this->hasMany(Cart::class, 'user_id', 'id');
    }
}
