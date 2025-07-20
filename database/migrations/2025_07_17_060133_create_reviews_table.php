<?php

use App\Models\User;
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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            // con foreignIdFor se crea una columna que es una llave foranea 
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Book::class);
            $table->string('title');
            $table->text('description');
            $table->integer('stars');
            $table->boolean('is_approved')->default(0); // Por defecto la reseña tendra que aprobarla el administrador
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
