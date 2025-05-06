@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Ítems de Factura</h1>
                </div>
                <div class="card-body">
                    <!-- Create Button -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('invoice-items.create') }}" class="btn btn-success">Crear Ítem</a>
                    </div>

                    <!-- Table -->
                    <table class="table table-striped">
                        <thead class="table-dark">
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
                                        <form action="{{ route('invoice-items.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar ítem?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $invoiceItems->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
