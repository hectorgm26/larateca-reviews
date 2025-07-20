<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Funciones para verificar si el usuario es administrador o no
    public function isAdmin() {
        return $this->is_admin; // Retorna true si es administrador, false si no lo es
    }

    public function isReader() {
        // return !$this->isAdmin(); // Retorna true si NO es administrador, es decir, si es lector
        // Tanto lectores como admin pueden dejar reseñas
        return true;
    }

    public function reviews() {
        // Un usuario puede tener muchas reseñas, por eso se usa el hasMany
        return $this->hasMany(Review::class);
    }
}
