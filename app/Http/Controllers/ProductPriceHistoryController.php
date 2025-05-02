<?php

namespace App\Http\Controllers;

use App\Models\ProductPriceHistory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPriceHistoryController extends Controller
{
    public function index()
    {
        $histories = ProductPriceHistory::with('product')->get();
        return view('product_price_history.index', compact('histories'));
    }

    public function create()
    {
        $products = Product::all();
        return view('product_price_history.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'precio_anterior' => 'required|numeric',
            'precio_nuevo' => 'required|numeric',
            'cambiado_en' => 'nullable|date',
        ]);

        ProductPriceHistory::create($request->all());

        return redirect()->route('product_price_history.index')
                         ->with('success', 'Historial de precio creado correctamente.');
    }

    public function show(ProductPriceHistory $productPriceHistory)
    {
        return view('product_price_history.show', compact('productPriceHistory'));
    }

    public function edit(ProductPriceHistory $productPriceHistory)
    {
        $products = Product::all();
        return view('product_price_history.edit', compact('productPriceHistory', 'products'));
    }

    public function update(Request $request, ProductPriceHistory $productPriceHistory)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'precio_anterior' => 'required|numeric',
            'precio_nuevo' => 'required|numeric',
            'cambiado_en' => 'nullable|date',
        ]);

        $productPriceHistory->update($request->all());

        return redirect()->route('product_price_history.index')
                         ->with('success', 'Historial de precio actualizado correctamente.');
    }

    public function destroy(ProductPriceHistory $productPriceHistory)
    {
        $productPriceHistory->delete();

        return redirect()->route('product_price_history.index')
                         ->with('success', 'Historial de precio eliminado correctamente.');
    }
}
