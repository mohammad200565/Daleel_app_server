<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'personId',
        'profileImage',
        'birthdate',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function booted()
    {
        static::deleting(function ($user) {
            if ($user->cart) {
                $user->cart->items()->delete();
                $user->cart()->delete();
            }
            if ($user->stores) {
                foreach ($user->stores as $store) {
                    $store->products()->detach();
                    $store->delete();
                }
            }
            if (method_exists($user, 'tokens')) {
                $user->tokens()->delete();
            }
            $user->orders()->delete();
        });
    }
}
