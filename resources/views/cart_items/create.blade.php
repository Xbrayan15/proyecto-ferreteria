@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Agregar Ítem al Carrito</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('cart-items.store') }}" method="POST">
                        @csrf

                        <!-- Carrito -->
                        <div class="mb-4">
                            <label for="shopping_cart_id" class="form-label fw-bold">Carrito</label>
                            <select name="shopping_cart_id" id="shopping_cart_id" class="form-select" required>
                                @foreach($carts as $cart)
                                    <option value="{{ $cart->id }}">Usuario: {{ $cart->user->name ?? 'N/A' }} (ID: {{ $cart->id }})</option>
                                @endforeach
                            </select>
                            @error('shopping_cart_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Producto -->
                        <div class="mb-4">
                            <label for="product_id" class="form-label fw-bold">Producto</label>
                            <select name="product_id" id="product_id" class="form-select" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->nombre }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cantidad -->
                        <div class="mb-4">
                            <label for="quantity" class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                            @error('quantity')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Agregar</button>
                            <a href="{{ route('cart-items.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
