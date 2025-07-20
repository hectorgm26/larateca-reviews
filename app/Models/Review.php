<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// La relación belongsTo se usa cuando el modelo actual tiene la clave foránea (foreign key) que apunta a otro modelo.

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Crear relaciones con otros modelos - En este caso, una reseña solo puede pertenecer a un libro y a un usuario, por eso se coloca en singular
    public function book() {

        // belongsToMany() se usa cuando un modelo está relacionado con muchos otros a través de una tabla intermedia (relación muchos a muchos).

        // El belongsTo indica que una reseña pertenece a... un libro
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
