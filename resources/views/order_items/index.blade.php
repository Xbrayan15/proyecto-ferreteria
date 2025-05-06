@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Ítems de Pedido</h1>
                </div>
                <div class="card-body">
                    <!-- Create Button -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('order-items.create') }}" class="btn btn-success">Crear nuevo ítem</a>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Table -->
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Pedido</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderItems as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>#{{ $item->order_id }}</td>
                                    <td>{{ $item->product->name ?? 'N/A' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>
                                        <a href="{{ route('order-items.show', $item) }}" class="btn btn-sm btn-info">Ver</a>
                                        <a href="{{ route('order-items.edit', $item) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('order-items.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este ítem?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $orderItems->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
