<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookPageController extends Controller
{
    /**
     * Handle the incoming request.
     */

    // Como se quiere obtener un libro por su id, se debe inyectar el modelo Book y Laravel lo buscara automaticamente por su id
    public function __invoke(Book $book)
    {
        //dd($book);

        // Lazy loading en caso de que si ya tenemos un modelo definido en otra clase, podemos precargar esa info y agregarle querys adicionales. En este caso, como en el controlador de BooksPageController ya se cargaron las relaciones de authors y genres, no es necesario volver a cargarlas aqui.
        $book->loadAvg('reviews', 'stars')
            ->loadCount('reviews');

        $reviews = $book->reviews()
            ->where('is_approved', 1)
            ->orderByDesc('created_at')
            ->paginate(5); // Con paginate no es necesario el get

        return view('books.show', compact('book', 'reviews'));
    }
}
