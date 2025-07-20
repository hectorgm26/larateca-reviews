<?php

use App\Http\Controllers\AdminApproveReviewController;
use App\Http\Controllers\BookPageController;
use App\Http\Controllers\BooksPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreBookReviewController;
use App\Http\Controllers\WelcomePageController;
use App\Http\Middleware\IsAdmin;
use App\Models\Review;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', WelcomePageController::class);

Route::get('/books', BooksPageController::class);

// Esta ruta recibe un parametro {book}, es decir, el modelo, y laravel lo asocia a su id, y se puede acceder a el mediante $book en el controlador.
Route::get('/books/{book}', BookPageController::class)->name('books.show');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::get('/dashboard', function () {
    
    /** @var \App\Models\User|null $user */
    $user = auth()->user();

    $pendingReviews = null;

    if ($user && $user->isAdmin()) {
        $pendingReviews = Review::where('is_approved', false)
            ->latest()
            ->paginate(10);
    }

    return view('dashboard', compact('pendingReviews'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Primero antes de querer entrar a una ruta, se validara el middleware de autenticacion
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Se usa una funcion group ya que van a ser varias rutas que requieren el mismo middleware. Si solo fuera una ruta, se podria usar directamente en la ruta
    Route::middleware('is.admin')->group(function () {

        Route::get('/only-admin', function () {
            return "Solo el administrador puede ver este contenido";
        });

        // Nueva ruta para aprobar reseñas
        Route::patch('/admin/reviews/{review}/approve', AdminApproveReviewController::class)
            ->name('admin.reviews.approve');
    });

    Route::middleware('is.reader')->group(function () {
        Route::get('/only-reader', function () {
            return 'sólo el lector puede ver esto';
        });

        Route::post('/books/{book}/reviews', StoreBookReviewController::class)
            ->name('reviews.store');
    });

});


require __DIR__.'/auth.php';
