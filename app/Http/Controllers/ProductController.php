<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Stock;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Models\ProductPriceHistory;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'subcategory', 'brand', 'stock', 'tax'])->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $stocks = Stock::all();
        $taxes = Tax::all();

        return view('products.create', compact('categories', 'subcategories', 'brands', 'stocks', 'taxes'));
    }

   

public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:100',
        'descripcion' => 'nullable|string',
        'sku' => 'required|string|max:100|unique:products,sku',
        'precio' => 'required|numeric',
        'stock' => 'required|integer',
        'category_id' => 'nullable|exists:categories,id',
        'subcategory_id' => 'nullable|exists:subcategories,id',
        'brand_id' => 'nullable|exists:brands,id',
        'stock_id' => 'nullable|exists:stocks,id',
        'tax_id' => 'nullable|exists:taxes,id',
    ]);

    // Crear el producto y obtener su instancia
    $product = Product::create($request->all());

    // Guardar el precio en historial
    ProductPriceHistory::create([
        'product_id' => $product->id,
        'precio_anterior' => $request->precio,
        'precio_nuevo' => $request->precio,
        'cambiado_en' => now(),
    ]);

    return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
}


    public function show(Product $product)
    {
        $product->load(['category', 'subcategory', 'brand', 'stock', 'tax']);
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $stocks = Stock::all();
        $taxes = Tax::all();

        return view('products.edit', compact('product', 'categories', 'subcategories', 'brands', 'stocks', 'taxes'));
    }



public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:100',
        'descripcion' => 'nullable|string',
        'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
        'precio' => 'required|numeric',
        'stock' => 'required|integer',
        'category_id' => 'nullable|exists:categories,id',
        'subcategory_id' => 'nullable|exists:subcategories,id',
        'brand_id' => 'nullable|exists:brands,id',
        'stock_id' => 'nullable|exists:stocks,id',
        'tax_id' => 'nullable|exists:taxes,id',
    ]);

    // Si el precio cambió, registramos en el historial
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
