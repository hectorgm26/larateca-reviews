<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

// dd($books); Se utiliza dd() para depurar y ver los libros obtenidos
// DB::enableQueryLog(); Se utiliza para ver las consultas SQL que se estan ejecutando y trackearlas con debug

class WelcomePageController extends Controller
{
    // Como la unica funcion de este controlador sera mostrar la vista, se utiliza el metodo __invoke, que permite que el controlador sea llamado como una funcion, por medio del enrutamiento
    public function __invoke()
    {
        // Con with se pueden cargar relaciones entre los modelos
        // en el parametro se coloca el nombre de la relacion definida en el modelo
        $featuredBooks = Book::query()
            ->with(['authors', 'genres', 'reviews'])
            ->withCount('reviews') // Esto permite contar las reseñas de cada libro, contando las relaciones. Crea una columna reviews_count
            ->withAvg('reviews', 'stars') // Esto permite calcular el promedio de los reviews relacionados a un libro, y en el segundo argumento se coloca la columna que se quiere promediar. Creara una columna reviews_avg_stars
            ->orderByDesc('reviews_count') // Ordena los libros por la cantidad de reseñas, de mayor a menor
            ->take(4) // Limita la cantidad de libros a 4 que se mostraran en la vista
            ->get();
            // si se quiere ver la query completa, se utiliza toRawSql() en lugar de get()


        // Mostrar las mejores reseñas de 4 libros en la seccion Reseñas
        $reviews = Review::query()
            ->with(['book', 'user']) // Carga las relaciones book y user de la reseña, para optimizar el n+1 problema
            ->where('is_approved', '=', 1) // Filtra las reseñas aprobadas - Es lo mismo que hacer whereIsApproved(1), la convencion de Laravel es con camelCase, es decir, la primera letra de cada palabra con mayuscula, sin poner los guiones bajos
            ->where('stars', '=', 5) // Filtra las reseñas con 5 estrellas
            ->get() // a partir de aqui ya tenemos una coleccion, y podemos hacerle mas filtros
            ->random(4);

        //dd($reviews->first()->book->name); // permite ver el nombre del libro de la primera reseña
        //dd($reviews->first()->book->user()); // permite ver el usuario que hizo la reseña de la primera reseña 


        $books = Book::query()
            ->with(['authors', 'genres', 'reviews'])
            ->withAvg('reviews', 'stars')
            ->withCount('reviews')
            ->orderByDesc('reviews_avg_stars') // Ordena los libros por el promedio obtenido por el withAvg
            ->take(8)
            ->get();

        return view('welcome', compact('featuredBooks', 'reviews', 'books'));
        // compact retorna una variable books, que tendra el valor de $books (compact es para que sea igual al nombre de la variable). es lo mismo que hacer: return view('welcome', ['books' => $books]);
    }
}
