<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockMovementRequest;
use App\Http\Requests\UpdateStockMovementRequest;
use App\Models\Product;
use App\Models\StockMovement;

class StockMovementController extends Controller
{
    public function index()
    {
        $movements = StockMovement::with('product')->latest()->paginate(10);
        return view('stock_movements.index', compact('movements'));
    }

    public function create()
    {
        $products = Product::all();  // No necesitas 'with' para 'stock' porque 'stock' está directamente en 'products'
        return view('stock_movements.create', compact('products'));
    }

    public function store(StoreStockMovementRequest $request)
    {
        $data = $request->validated();

        // Ajustar la cantidad según el tipo de movimiento (salida o entrada)
        $adjustedQuantity = $data['movement_type'] === 'salida' ? -abs($data['quantity']) : abs($data['quantity']);

        // Crear el movimiento de stock
        $movement = StockMovement::create([
            'product_id' => $data['product_id'],
            'quantity' => $adjustedQuantity,
            'movement_type' => $data['movement_type'],
            'description' => $data['description'],
        ]);

        // Actualizar el stock del producto
        $product = $movement->product;
        $product->stock += $adjustedQuantity;  // Modificamos directamente el campo 'stock' del producto
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
        $product = $stockMovement->product;
        $product->stock -= $stockMovement->quantity;  // Restar la cantidad previa al stock
        $product->save();

        // Calcular nueva cantidad según el tipo
        $newQuantity = $data['movement_type'] === 'salida' ? -abs($data['quantity']) : abs($data['quantity']);

        // Actualizar el movimiento de stock
        $stockMovement->update([
            'product_id' => $data['product_id'],
            'quantity' => $newQuantity,
            'movement_type' => $data['movement_type'],
            'description' => $data['description'],
        ]);

        // Aplicar el nuevo movimiento al stock
        $newProduct = Product::find($data['product_id']);
        $newProduct->stock += $newQuantity;  // Modificar directamente el campo 'stock'
        $newProduct->save();

        return redirect()->route('stock-movements.index')->with('success', 'Movimiento actualizado correctamente.');
    }

    public function destroy(StockMovement $stockMovement)
    {
        // Revertir el efecto del movimiento en el stock
        $product = $stockMovement->product;
        $product->stock -= $stockMovement->quantity;  // Restar la cantidad del stock
        $product->save();

        // Eliminar el movimiento
        $stockMovement->delete();

        return redirect()->route('stock-movements.index')->with('success', 'Movimiento eliminado correctamente.');
    }
}

