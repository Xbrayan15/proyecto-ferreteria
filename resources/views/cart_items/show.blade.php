@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Ítem del Carrito</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Carrito:</strong> Usuario: {{ $cartItem->shoppingCart->user->name ?? 'N/A' }} (ID: {{ $cartItem->shoppingCart->id }})</p>
            <p><strong>Producto:</strong> {{ $cartItem->product->nombre }}</p>
            <p><strong>Cantidad:</strong> {{ $cartItem->quantity }}</p>
            <p><strong>Fecha de creación:</strong> {{ $cartItem->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('cart-items.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
</div>
@endsection
