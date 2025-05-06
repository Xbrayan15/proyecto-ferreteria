@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ítems del Carrito</h1>

    <a href="{{ route('cart-items.create') }}" class="btn btn-primary mb-3">Agregar Ítem</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Carrito</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->shoppingCart->user->name ?? 'N/A' }}</td>
                        <td>{{ $item->product->nombre }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            <a href="{{ route('cart-items.show', $item) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('cart-items.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('cart-items.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este ítem?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($cartItems->isNotEmpty())
        <div class="mt-3">
            <a href="{{ route('cart-items.checkout') }}" class="btn btn-success">Proceder al Pago</a>
        </div>
    @else
        <p class="mt-3">Tu carrito está vacío. ¡Agrega productos para proceder con el pago!</p>
    @endif
</div>
@endsection
