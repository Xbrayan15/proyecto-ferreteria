@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Facturas</h1>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">Crear Factura</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pedido</th>
                <th>Usuario</th>
                <th>Método de Pago</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>#{{ $invoice->order_id }}</td>
                <td>{{ $invoice->user->name }}</td>
                <td>{{ $invoice->paymentMethod->name }}</td>
                <td>${{ $invoice->total_amount }}</td>
                <td>{{ ucfirst($invoice->status) }}</td>
                <td>
                    <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar factura?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $invoices->links() }}
</div>
@endsection
