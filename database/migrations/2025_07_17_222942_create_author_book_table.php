<?php

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crear una tabla intermedia para la relacion muchos a muchos entre autores y libros
        // Se usa el metodo foreignIdFor para crear las llaves foraneas de los modelos Author y Book
        // El nombre de la tabla intermedia se puede definir como author_book
        Schema::create('author_book', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Author::class);
            $table->foreignIdFor(\App\Models\Book::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_book');
    }
};
