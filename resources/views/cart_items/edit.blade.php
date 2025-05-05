@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Ítem del Carrito</h1>

    <form action="{{ route('cart-items.update', $cartItem) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="shopping_cart_id" class="form-label">Carrito</label>
            <select name="shopping_cart_id" class="form-select" required>
                @foreach($carts as $cart)
                    <option value="{{ $cart->id }}" {{ $cart->id == $cartItem->shopping_cart_id ? 'selected' : '' }}>
                        Usuario: {{ $cart->user->name ?? 'N/A' }} (ID: {{ $cart->id }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Producto</label>
            <select name="product_id" class="form-select" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $cartItem->product_id ? 'selected' : '' }}>
                        {{ $product->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" class="form-control" value="{{ $cartItem->quantity }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('cart-items.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
