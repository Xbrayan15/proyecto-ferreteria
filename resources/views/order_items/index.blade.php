@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ítems de Pedido</h1>
    <a href="{{ route('order-items.create') }}" class="btn btn-primary mb-3">Crear nuevo ítem</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
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
                        <form action="{{ route('order-items.destroy', $item) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este ítem?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $orderItems->links() }}
</div>
@endsection
