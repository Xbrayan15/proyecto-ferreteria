@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle del Carrito</h1>
                </div>
                <div class="card-body">
                    <!-- Shopping Cart Details -->
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>ID:</strong> {{ $shoppingCart->id }}</li>
                        <li class="list-group-item"><strong>Usuario:</strong> {{ $shoppingCart->user->name }}</li>
                        <li class="list-group-item"><strong>Creado en:</strong> {{ $shoppingCart->created_at->format('d/m/Y H:i') }}</li>
                        <li class="list-group-item"><strong>Actualizado en:</strong> {{ $shoppingCart->updated_at->format('d/m/Y H:i') }}</li>
                    </ul>

                    <!-- Cart Items -->
                    <h5 class="mb-3">Productos en el Carrito:</h5>
                    @if($shoppingCart->cartItems->isEmpty())
                        <p class="text-muted">No hay productos en este carrito.</p>
                    @else
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shoppingCart->cartItems as $item)
                                    <tr>
                                        <td>{{ $item->product->nombre }}</td>
                                        <td>{{ $item->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <!-- Back Button -->
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('shopping-carts.index') }}" class="btn btn-secondary px-4">Volver al listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
