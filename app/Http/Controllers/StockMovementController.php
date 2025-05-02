<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockMovementRequest;
use App\Http\Requests\UpdateStockMovementRequest;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index()
    {
        $movements = StockMovement::with('product')->latest()->paginate(10);
        return view('stock_movements.index', compact('movements'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock_movements.create', compact('products'));
    }

    public function store(StoreStockMovementRequest $request)
    {
        $data = $request->validated();

        // Ajustar la cantidad según el tipo de movimiento
        $adjustedQuantity = $data['movement_type'] === 'salida' ? -abs($data['quantity']) : abs($data['quantity']);

        $movement = StockMovement::create([
            'product_id' => $data['product_id'],
            'quantity' => $adjustedQuantity,
            'movement_type' => $data['movement_type'],
            'description' => $data['description'],
        ]);

        // Actualizar el stock del producto
        $product = $movement->product;
        $product->stock += $adjustedQuantity;
        $product->save();

        return redirect()->route('stock-movements.index')->with('success', 'Movimiento registrado correctamente.');
    }

    public function show(StockMovement $stockMovement)
    {
        return view('stock_movements.show', compact('stockMovement'));
    }

    public function edit(StockMovement $stockMovement)
    {
        $products = Product::all();
        return view('stock_movements.edit', compact('stockMovement', 'products'));
    }

    public function update(UpdateStockMovementRequest $request, StockMovement $stockMovement)
    {
        $data = $request->validated();

        // Revertir el movimiento anterior
        $oldQuantity = $stockMovement->quantity;
        $stockMovement->product->stock -= $oldQuantity;
        $stockMovement->product->save();

        // Calcular nueva cantidad según el tipo
        $newQuantity = $data['movement_type'] === 'salida' ? -abs($data['quantity']) : abs($data['quantity']);

        $stockMovement->update([
            'product_id' => $data['product_id'],
            'quantity' => $newQuantity,
            'movement_type' => $data['movement_type'],
            'description' => $data['description'],
        ]);

        // Aplicar el nuevo movimiento al producto
        $product = Product::find($data['product_id']);
        $product->stock += $newQuantity;
        $product->save();

        return redirect()->route('stock-movements.index')->with('success', 'Movimiento actualizado correctamente.');
    }

    public function destroy(StockMovement $stockMovement)
    {
        // Revertir el efecto del movimiento en el stock
        $product = $stockMovement->product;
        $product->stock -= $stockMovement->quantity;
        $product->save();

        $stockMovement->delete();

        return redirect()->route('stock-movements.index')->with('success', 'Movimiento eliminado correctamente.');
    }
}
