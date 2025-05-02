<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // Mostrar todas las marcas
    public function index()
    {
        $brands = Brand::all();  // Obtener todas las marcas de la base de datos
        return view('brands.index', compact('brands'));  // Devolver la vista con las marcas
    }

    // Mostrar formulario para crear una nueva marca
    public function create()
    {
        return view('brands.create');  // Devolver la vista para crear una nueva marca
    }

    // Guardar una nueva marca
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        // Crear la marca en la base de datos
        Brand::create($request->all());

        // Redirigir a la lista de marcas con un mensaje de éxito
        return redirect()->route('brands.index')->with('success', 'Marca creada correctamente.');
    }

    // Mostrar detalles de una marca específica
    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));  // Devolver la vista con los detalles de la marca
    }

    // Mostrar formulario para editar una marca existente
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));  // Devolver la vista para editar la marca
    }

    // Actualizar la marca en la base de datos
    public function update(Request $request, Brand $brand)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        // Actualizar la marca con los nuevos datos
        $brand->update($request->all());

        // Redirigir a la lista de marcas con un mensaje de éxito
        return redirect()->route('brands.index')->with('success', 'Marca actualizada correctamente.');
    }

    // Eliminar una marca de la base de datos
    public function destroy(Brand $brand)
    {
        // Eliminar la marca
        $brand->delete();

        // Redirigir a la lista de marcas con un mensaje de éxito
        return redirect()->route('brands.index')->with('success', 'Marca eliminada correctamente.');
    }
}
