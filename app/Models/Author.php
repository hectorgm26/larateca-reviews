<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function books() {
        return $this->belongsToMany(Book::class);
        // Un autor puede tener muchos libros y un libro puede tener muchos autores
    }
}
