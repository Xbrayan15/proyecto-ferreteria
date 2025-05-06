@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Ítems del Carrito</h1>
                </div>
                <div class="card-body">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Create Button -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('cart-items.create') }}" class="btn btn-success">Agregar Ítem</a>
                    </div>

                    <!-- Table -->
                    <table class="table table-striped">
                        <thead class="table-dark">
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
