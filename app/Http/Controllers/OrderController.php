<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Address;
use App\Models\Coupon;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'address', 'coupon', 'paymentMethod'])->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        $addresses = Address::all();
        $coupons = Coupon::all();
        $paymentMethods = PaymentMethod::all();
        return view('orders.create', compact('users', 'addresses', 'coupons', 'paymentMethods'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'address_id' => 'required|exists:addresses,id',
            'coupon_id' => 'nullable|exists:coupons,id',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Pedido creado exitosamente.');
    }

    public function show(Order $order)
    {
        $order->load(['user', 'address', 'coupon', 'paymentMethod']);
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $users = User::all();
        $addresses = Address::all();
        $coupons = Coupon::all();
        $paymentMethods = PaymentMethod::all();
        return view('orders.edit', compact('order', 'users', 'addresses', 'coupons', 'paymentMethods'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'address_id' => 'required|exists:addresses,id',
            'coupon_id' => 'nullable|exists:coupons,id',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pedido eliminado.');
    }

    public function checkoutFromCart(Request $request)
{
    $user = auth()->user();  // Obtener el usuario autenticado

    // Verificar si el carrito está vacío
    $cart = $user->shoppingCart()->with('cartItems.product')->first();

    if (!$cart || $cart->cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Tu carrito está vacío.');
    }

    $request->validate([
        'address_id' => 'required|exists:addresses,id',
        'payment_method_id' => 'nullable|exists:payment_methods,id',
        'coupon_id' => 'nullable|exists:coupons,id',
    ]);

    DB::beginTransaction();

    try {
        $totalAmount = 0;

        // Calcular el monto total del pedido
        foreach ($cart->cartItems as $item) {
            if ($item->product->stock < $item->quantity) {
                throw new \Exception("No hay suficiente stock para '{$item->product->name}'.");
            }

            $totalAmount += $item->product->price * $item->quantity;
        }

        // Crear el pedido
        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => $request->address_id,
            'coupon_id' => $request->coupon_id,
            'payment_method_id' => $request->payment_method_id,
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ]);

        // Agregar los artículos al pedido
        foreach ($cart->cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);

            // Reducir el stock del producto
            $item->product->decrement('stock', $item->quantity);
        }

        // Vaciar el carrito
        $cart->cartItems()->delete();

        DB::commit();

        return redirect()->route('orders.show', $order)->with('success', 'Pedido realizado con éxito.');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', $e->getMessage());
    }
}

    
}
$user = auth()->user();