@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle del Ítem del Carrito</h1>
                </div>
                <div class="card-body">
                    <p><strong>Carrito:</strong> Usuario: {{ $cartItem->shoppingCart->user->name ?? 'N/A' }} (ID: {{ $cartItem->shoppingCart->id }})</p>
                    <p><strong>Producto:</strong> {{ $cartItem->product->nombre }}</p>
                    <p><strong>Cantidad:</strong> {{ $cartItem->quantity }}</p>
                    <p><strong>Fecha de creación:</strong> {{ $cartItem->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('cart-items.index') }}" class="btn btn-secondary px-4">Volver al listado</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
