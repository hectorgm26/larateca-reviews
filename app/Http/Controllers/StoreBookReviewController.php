<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class StoreBookReviewController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'stars' => 'required|integer|digits_between:1,5'
        ]);

        auth()->user()->reviews()->create([
            'book_id' => $book->id,
            ...$validated
        ]);

        // Sesiones flash para mostrar un mensaje temporal, que se mantienen en la misma pagina
        $request->session()->flash('message', 'Reseña creada');

        return back();
    }
}
