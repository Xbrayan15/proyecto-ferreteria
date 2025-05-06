@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Agregar Ítem al Carrito</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Hay algunos problemas con los datos ingresados.<br><br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cart-items.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="shopping_cart_id" class="form-label">Carrito</label>
            <select name="shopping_cart_id" class="form-select" required>
                <option value="">Seleccione un carrito</option>
                @foreach($carts as $cart)
                    <option value="{{ $cart->id }}">
                        Usuario: {{ $cart->user->name ?? 'N/A' }} (ID: {{ $cart->id }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Producto</label>
            <select name="product_id" class="form-select" required>
                <option value="">Seleccione un producto</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" class="form-control" min="1" value="1" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="{{ route('cart-items.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
