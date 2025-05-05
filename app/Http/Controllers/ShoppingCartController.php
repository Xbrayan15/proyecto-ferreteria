<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * Mostrar todos los carritos de compra.
     */
    public function index()
    {
        $carts = ShoppingCart::with('user')->get();
        return view('shopping_carts.index', compact('carts'));
    }

    /**
     * Mostrar el formulario para crear un nuevo carrito.
     */
    public function create()
    {
        $users = User::all();
        return view('shopping_carts.create', compact('users'));
    }

    /**
     * Guardar un nuevo carrito.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        ShoppingCart::create($request->only('user_id'));

        return redirect()->route('shopping-carts.index')
            ->with('success', 'Carrito creado exitosamente.');
    }

    /**
     * Mostrar detalles de un carrito específico.
     */
    public function show(ShoppingCart $shoppingCart)
    {
        $shoppingCart->load('user', 'cartItems.product');
        return view('shopping_carts.show', compact('shoppingCart'));
    }

    /**
     * Mostrar el formulario para editar un carrito.
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        $users = User::all();
        return view('shopping_carts.edit', compact('shoppingCart', 'users'));
    }

    /**
     * Actualizar un carrito específico.
     */
    public function update(Request $request, ShoppingCart $shoppingCart)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $shoppingCart->update($request->only('user_id'));

        return redirect()->route('shopping-carts.index')
            ->with('success', 'Carrito actualizado exitosamente.');
    }

    /**
     * Eliminar un carrito.
     */
    public function destroy(ShoppingCart $shoppingCart)
    {
        $shoppingCart->delete();

        return redirect()->route('shopping-carts.index')
            ->with('success', 'Carrito eliminado correctamente.');
    }
}
