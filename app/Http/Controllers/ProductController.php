<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Models\ProductPriceHistory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'subcategory', 'brand', 'tax'])->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $taxes = Tax::all();

        return view('products.create', compact('categories', 'subcategories', 'brands', 'taxes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'sku' => 'required|string|max:100|unique:products,sku',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',  // Aquí ahora se maneja directamente el stock
            'category_id' => 'nullable|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'tax_id' => 'nullable|exists:taxes,id',
        ]);

        // Crear el producto
        $product = Product::create($validated);

        if ($product->stock > 0) {
            \App\Models\StockMovement::create([
                'product_id' => $product->id,
                'quantity' => $product->stock,
                'movement_type' => 'entrada',
                'description' => 'Stock inicial al crear el producto',
            ]);
        }

        // Registrar el precio en el historial
        ProductPriceHistory::create([
            'product_id' => $product->id,
            'precio_anterior' => $validated['precio'],
            'precio_nuevo' => $validated['precio'],
            'cambiado_en' => now(),
        ]);

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    public function show(Product $product)
{
    // Cargar relaciones necesarias
    $product->load([
        'category',
        'subcategory',
        'brand',
        'tax',
        'productReviews.user' // Carga también las reseñas con los usuarios
    ]);

    return view('products.show', compact('product'));
}


    public function edit(Product $product)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $taxes = Tax::all();

        return view('products.edit', compact('product', 'categories', 'subcategories', 'brands', 'taxes'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
            'precio' => 'required|numeric',
            'stock' => 'required|integer',  // Actualiza la cantidad de stock
            'category_id' => 'nullable|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'tax_id' => 'nullable|exists:taxes,id',
        ]);

        // Si el precio cambió, registramos el cambio en el historial
        if ($product->precio != $validated['precio']) {
            ProductPriceHistory::create([
                'product_id' => $product->id,
                'precio_anterior' => $product->precio,
                'precio_nuevo' => $validated['precio'],
                'cambiado_en' => now(),
            ]);
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
    
}
