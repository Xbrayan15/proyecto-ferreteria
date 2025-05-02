<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // Mostrar todos los registros de stock
    public function index()
    {
        $stocks = Stock::all();  // Obtener todos los stocks de la base de datos
        return view('stocks.index', compact('stocks'));  // Devolver la vista con los stocks
    }

    // Mostrar formulario para crear un nuevo stock
    public function create()
    {
        return view('stocks.create');  // Devolver la vista para crear un nuevo stock
    }

    // Guardar un nuevo stock
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'cantidad' => 'required|integer|min:0',
        ]);

        // Crear el nuevo registro de stock en la base de datos
        Stock::create($request->all());

        // Redirigir a la lista de stocks con un mensaje de éxito
        return redirect()->route('stocks.index')->with('success', 'Stock creado correctamente.');
    }

    // Mostrar los detalles de un stock específico
    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));  // Devolver la vista con los detalles del stock
    }

    // Mostrar formulario para editar un stock existente
    public function edit(Stock $stock)
    {
        return view('stocks.edit', compact('stock'));  // Devolver la vista para editar el stock
    }

    // Actualizar un stock en la base de datos
    public function update(Request $request, Stock $stock)
    {
        // Validar los datos de entrada
        $request->validate([
            'cantidad' => 'required|integer|min:0',
        ]);

        // Actualizar el registro de stock con los nuevos datos
        $stock->update($request->all());

        // Redirigir a la lista de stocks con un mensaje de éxito
        return redirect()->route('stocks.index')->with('success', 'Stock actualizado correctamente.');
    }

    // Eliminar un stock de la base de datos
    public function destroy(Stock $stock)
    {
        // Eliminar el stock
        $stock->delete();

        // Redirigir a la lista de stocks con un mensaje de éxito
        return redirect()->route('stocks.index')->with('success', 'Stock eliminado correctamente.');
    }
}
