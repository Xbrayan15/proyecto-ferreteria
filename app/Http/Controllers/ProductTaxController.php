<?php

namespace App\Http\Controllers;

use App\Models\ProductTax;
use App\Models\Product;
use App\Models\Tax;
use Illuminate\Http\Request;

class ProductTaxController extends Controller
{
    public function index()
    {
        $productTaxes = ProductTax::with(['product', 'tax'])->get();
        return view('product_tax.index', compact('productTaxes'));
    }

    public function create()
    {
        $products = Product::all();
        $taxes = Tax::all();
        return view('product_tax.create', compact('products', 'taxes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'tax_id' => 'required|exists:taxes,id',
        ]);

        ProductTax::create($request->only('product_id', 'tax_id'));

        return redirect()->route('product-tax.index')->with('success', 'Relación producto-impuesto creada correctamente.');
    }

    public function show(ProductTax $productTax)
    {
        return view('product_tax.show', compact('productTax'));
    }

    public function edit(ProductTax $productTax)
    {
        $products = Product::all();
        $taxes = Tax::all();
        return view('product_tax.edit', compact('productTax', 'products', 'taxes'));
    }

    public function update(Request $request, ProductTax $productTax)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'tax_id' => 'required|exists:taxes,id',
        ]);

        $productTax->update($request->only('product_id', 'tax_id'));

        return redirect()->route('product-tax.index')->with('success', 'Relación actualizada correctamente.');
    }

    public function destroy(ProductTax $productTax)
    {
        $productTax->delete();
        return redirect()->route('product-tax.index')->with('success', 'Relación eliminada correctamente.');
    }
}
