<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder; // Para usar querys mas complejas como whereRaw (por ejemplo, para buscar con like)
use Illuminate\Support\Facades\DB;

class BooksPageController
{
    public function __invoke()
    {
        // dd(request('search')); // Se utiliza para depurar y ver el valor del input de busqueda de la vista

        $books = Book::query()
            ->with(['authors', 'genres'])
            ->withAvg('reviews', 'stars')
            ->withCount('reviews')
            ->when(request('search'), function (Builder $query, $value) {
                $query->whereRaw('books.name LIKE ?', ["%{$value}%"]) // el whereRaw permite mediante el like y el comodin %, buscar cualquier coincidencia en el nombre del libro. Se utiliza el ? para evitar inyecciones SQL y se pasa el valor como un array. se utiliza books.name para buscar en la columna name de la tabla books. El $value viene del request de la vista, y es el valor del input
                    ->orWhereHas('authors', function (Builder $query) use ($value) {
                        $query->whereRaw('authors.name LIKE ?', ["%{$value}%"]);
                });
            })
            ->paginate(8); // El método paginate permite paginar los resultados, en este caso 8 libros por página. Por paginacion se entiende que se mostraran 8 libros por pagina y si hay mas, se mostrara un boton para ver la siguiente pagina. Si no se quiere paginacion, se puede usar el metodo get() para obtener todos los libros. Con paginate, en la vista se puede usar $books->links() para mostrar los enlaces de paginación.

        return view('books.index', compact('books'));
    }
}