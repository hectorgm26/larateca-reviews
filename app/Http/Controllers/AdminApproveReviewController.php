<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AdminApproveReviewController extends Controller
{
    public function __invoke(Review $review)
    {
        $review->update(['is_approved' => true]);  // Aquí cambias el campo a true, que se recibe por el formulario de aprobación del dashboard en el admin

        return back()->with('message', 'La reseña fue aprobada con éxito.');
    }
}
