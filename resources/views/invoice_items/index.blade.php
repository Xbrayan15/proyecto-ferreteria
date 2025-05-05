@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ítems de Factura</h1>
    <a href="{{ route('invoice-items.create') }}" class="btn btn-primary mb-3">Crear Ítem</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Factura</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoiceItems as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->invoice->id }}</td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>
                    <a href="{{ route('invoice-items.show', $item) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('invoice-items.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('invoice-items.destroy', $item) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar ítem?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $invoiceItems->links() }}
</div>
@endsection
