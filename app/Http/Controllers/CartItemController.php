<?php


namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

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

    // Mostrar formulario de checkout
    public function showCheckoutForm(Request $request)
    {
        // Validate user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para continuar.');
        }

        $user = Auth::user();


        // Fetch user's shopping cart with related items and products
        $cart = $user->shoppingCart()->with('cartItems.product')->first();

        // Check if cart exists and has items
        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart-items.index')
                ->with('error', 'Tu carrito está vacío.');
        }

        // Fetch user-specific addresses
        $addresses = Address::where('user_id', $user->id)->get();

        // Additional validation for addresses and payment methods
        if ($addresses->isEmpty()) {
            return redirect()->route('addresses.create')
                ->with('error', 'Debes agregar una dirección de envío primero.');
        }

        // Fetch all payment methods
        $paymentMethods = PaymentMethod::all();
        Log::info('Payment methods loaded:', ['paymentMethods' => PaymentMethod::all()]);

        if ($paymentMethods->isEmpty()) {
            return redirect()->route('payment-methods.create')
                ->with('error', 'No hay métodos de pago disponibles.');
        }

        // Calculate cart total
        $cartTotal = $cart->cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        Log::info('Payment methods loaded:', ["payment"=>$paymentMethods]);
        // Render checkout view with all necessary data
        return view('checkout.checkout', [
            'cart' => $cart,
            'addresses' => $addresses,
            'paymentMethods' => $paymentMethods,
            'cartTotal' => $cartTotal
        ]);
    }

    public function checkout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para continuar.');
        }

        $user = $request->user();
        $cart = $user->shoppingCart()->with('cartItems.product')->first();
        $cartItems = $cart?->cartItems ?? collect();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart-items.index')
                ->with('error', 'Tu carrito está vacío.');
        }

        // Load addresses and payment methods
        $addresses = Address::where('user_id', $user->id)->get();
        $paymentMethods = PaymentMethod::all();

        // Validate the request
        $request->validate([
            'address_id' => [
                'required',
                Rule::exists('addresses', 'id')->where(fn ($query) => $query->where('user_id', $user->id)),
            ],
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
                        ->with('error', "No hay suficiente stock para '{$item->product->name}'.")
                        ->with('addresses', $addresses)
                        ->with('paymentMethods', $paymentMethods)
                        ->with('cartTotal', $cartItems->sum(fn ($item) => $item->quantity * $item->product->price));
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

            return redirect()->route('orders.show', $order)
                ->with('success', 'Pedido realizado con éxito. Número de orden: ' . $order->id);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('cart-items.index')
                ->with('error', 'Hubo un problema al procesar tu pedido. Intenta nuevamente.')
                ->with('addresses', $addresses)
                ->with('paymentMethods', $paymentMethods)
                ->with('cartTotal', $cartItems->sum(fn ($item) => $item->quantity * $item->product->price));
        }
    }
}