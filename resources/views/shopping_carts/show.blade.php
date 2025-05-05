@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Carrito</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $shoppingCart->id }}</p>
            <p><strong>Usuario:</strong> {{ $shoppingCart->user->name }}</p>
            <p><strong>Creado en:</strong> {{ $shoppingCart->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Actualizado en:</strong> {{ $shoppingCart->updated_at->format('d/m/Y H:i') }}</p>

            <hr>
            <h5>Productos en el Carrito:</h5>
            @if($shoppingCart->cartItems->isEmpty())
                <p>No hay productos en este carrito.</p>
            @else
                <ul>
                    @foreach($shoppingCart->cartItems as $item)
                        <li>{{ $item->product->nombre }} - Cantidad: {{ $item->quantity }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <a href="{{ route('shopping-carts.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
</div>
@endsection
