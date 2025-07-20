<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /* Con el atributo $fillable se especifican los campos que queremos permitir a la app que se registren en la base de datos. Si no se quiere alguna, no se debe agregar al array

    protected $fillable = [
        'title',
        'author',
        'description',
        'published_at',
        'isbn',
        'cover_image',
    ];
    */

    // Pero si se quiere permitir que todos los campos sean rellenables
    protected $guarded = [];
    // Esto permite que todos los campos sean rellenables, pero no es recomendable por seguridad. Se recomienda usar $fillable para especificar los campos permitidos.

    protected $casts = [
        'published_at' => 'datetime' // Esto permite que el campo published_at se trate como una fecha y hora
    ];

    // Crear relaciones con otros modelos - en este caso en plurar ya que un libro puede tener muchas reseñas

    public function reviews() {
        // El hasMany indica que un libro puede tener muchas reseñas
        return $this->hasMany(Review::class);
    }

    public function authors() {
        // Cuando es una tabla intermedia, se usa belongsToMany
        return $this->belongsToMany(Author::class);
        // Un libro puede tener muchos autores y un autor puede tener muchos libros, por lo que se usa belongsToMany
    }

    public function genres() {
        // Un libro puede tener muchos generos y un genero puede tener muchos libros
        return $this->belongsToMany(Genre::class);
    }
}
