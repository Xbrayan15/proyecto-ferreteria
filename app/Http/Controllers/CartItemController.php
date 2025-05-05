<?php

// app/Http/Controllers/CartItemController.php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with(['shoppingCart', 'product'])->get();
        return view('cart_items.index', compact('cartItems'));
    }

    public function create()
    {
        $carts = ShoppingCart::all();
        $products = Product::all();
        return view('cart_items.create', compact('carts', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shopping_cart_id' => 'required|exists:shopping_carts,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        CartItem::create($request->all());

        return redirect()->route('cart-items.index')->with('success', 'Ítem agregado al carrito.');
    }

    public function show(CartItem $cartItem)
    {
        return view('cart_items.show', compact('cartItem'));
    }

    public function edit(CartItem $cartItem)
    {
        $carts = ShoppingCart::all();
        $products = Product::all();
        return view('cart_items.edit', compact('cartItem', 'carts', 'products'));
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'shopping_cart_id' => 'required|exists:shopping_carts,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update($request->all());

        return redirect()->route('cart-items.index')->with('success', 'Ítem actualizado.');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('cart-items.index')->with('success', 'Ítem eliminado.');
    }
}
