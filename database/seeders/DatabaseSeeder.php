<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // Creara 10 usuarios con el factory UserFactory
        // \App\Models\User::factory(10)->create();

        // // Los creara con estas características, y el factory UserFactory rellena con las restantes
        // \App\Models\User::factory()->create([
        //      'name' => 'Test User',
        //      'email' => 'test@example.com',
        //  ]);

        // Author::factory(10)->create();

        // Podemos hacer uso de las relaciones de los modelos
        
        // 1 admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'is_admin' => true,
        ]);

        // 19 lectores
        User::factory(19)->create();

        // Libros con autores, géneros y reseñas
        Book::factory(50)
            ->has(Author::factory(3))
            ->has(Genre::factory(2))
            ->has(Review::factory(10))
            ->create();
    }
}
