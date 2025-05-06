<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;



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

    // Mostrar formulario de checkout (GET)
    public function showCheckoutForm()
    {
        $user = auth()->user(); //



        
        $cart = $user->shoppingCart()->with('cartItems.product')->first();

        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart-items.index')->with('error', 'Tu carrito está vacío.');
        }

        $addresses = $user->addresses()->get();
        $paymentMethods = $user->paymentMethods()->get();

        return view('checkout.form', compact('cart', 'addresses', 'paymentMethods'));
    }

    // Procesar checkout (POST)
    public function checkout(Request $request)
    {
        $user = $request->user();
        $cart = $user->shoppingCart()->with('cartItems.product')->first();
        $cartItems = $cart?->cartItems ?? collect();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart-items.index')->with('error', 'Tu carrito está vacío.');
        }

        $request->validate([
            'address_id' => 'required|exists:addresses,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
        ], [
            'address_id.exists' => 'La dirección seleccionada no es válida.',
            'payment_method_id.exists' => 'El método de pago seleccionado no es válido.',
        ]);

        DB::beginTransaction();

        try {
            $totalAmount = 0;

            foreach ($cartItems as $item) {
                if ($item->product->stock < $item->quantity) {
                    return redirect()->route('cart-items.index')
                                     ->with('error', "No hay suficiente stock para '{$item->product->name}'.");
                }

                $totalAmount += $item->product->price * $item->quantity;
            }

            $order = Order::create([
                'user_id' => $user->id,
                'address_id' => $request->address_id,
                'payment_method_id' => $request->payment_method_id,
                'total_amount' => $totalAmount,
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                $item->product->decrement('stock', $item->quantity);
            }

            $cart->cartItems()->delete();

            DB::commit();

            return redirect()->route('orders.show', $order)->with('success',
                'Pedido realizado con éxito. Número de orden: ' . $order->id . ' y total: $' . number_format($totalAmount, 2));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart-items.index')->with('error', 'Hubo un problema al procesar tu pedido. Intenta nuevamente.');
        }
    }
}
