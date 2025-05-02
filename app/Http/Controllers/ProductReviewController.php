<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        ProductReview::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return back()->with('success', '¡Gracias por tu reseña!');
    }

    // Puedes añadir edit/update/destroy si das esa funcionalidad al usuario
}
