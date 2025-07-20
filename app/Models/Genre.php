<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function books() {
        // Un genero puede tener muchos libros y un libro puede tener muchos generos
        return $this->belongsToMany(Book::class);
    }
}
