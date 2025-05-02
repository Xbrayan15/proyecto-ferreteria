<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    // Mostrar todas las imágenes de un producto
    public function index($productId)
    {
        $product = Product::findOrFail($productId);
        $images = $product->images; // Relación con ProductImage

        return view('product_images.index', compact('product', 'images'));
    }

    // Mostrar el formulario para subir una nueva imagen
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('product_images.create', compact('product'));
    }

    // Subir una nueva imagen
    public function store(Request $request, $productId)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'is_main' => 'nullable|boolean'
        ]);

        $image = $request->file('image');
        $path = $image->store('product_images', 'public');

        ProductImage::create([
            'product_id' => $productId,
            'url' => $path,
            'is_main' => $request->has('is_main') ? $request->is_main : false
        ]);

        return redirect()->route('product.images.index', $productId)->with('success', 'Imagen subida con éxito.');
    }

    // Mostrar el formulario para editar una imagen
    public function edit($productId, $imageId)
    {
        $product = Product::findOrFail($productId);
        $image = ProductImage::findOrFail($imageId);

        return view('product_images.edit', compact('product', 'image'));
    }

    // Actualizar la información de una imagen
    public function update(Request $request, $productId, $imageId)
    {
        $request->validate([
            'is_main' => 'nullable|boolean'
        ]);

        $image = ProductImage::findOrFail($imageId);
        $image->update([
            'is_main' => $request->has('is_main') ? $request->is_main : false
        ]);

        return redirect()->route('product.images.index', $productId)->with('success', 'Imagen actualizada.');
    }

    // Eliminar una imagen
    public function destroy($productId, $imageId)
    {
        $image = ProductImage::findOrFail($imageId);

        // Eliminar la imagen del almacenamiento
        Storage::disk('public')->delete($image->url);

        // Eliminar el registro de la base de datos
        $image->delete();

        return redirect()->route('product.images.index', $productId)->with('success', 'Imagen eliminada.');
    }

    // Establecer una imagen como principal
    public function setMain($productId, $imageId)
    {
        $image = ProductImage::findOrFail($imageId);

        // Establecer todas las imágenes del producto como no principales
        ProductImage::where('product_id', $productId)->update(['is_main' => false]);

        // Establecer la imagen seleccionada como principal
        $image->update(['is_main' => true]);

        return redirect()->route('product.images.index', $productId)->with('success', 'Imagen principal actualizada.');
    }
}
