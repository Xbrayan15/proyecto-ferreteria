@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Facturas</h1>
                </div>
                <div class="card-body">
                    <!-- Create Button -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('invoices.create') }}" class="btn btn-success">Crear Factura</a>
                    </div>

                    <!-- Table -->
                    <table class="table table-striped">
                        <thead class="table-dark">
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
                                    <td>${{ number_format($invoice->total_amount, 2) }}</td>
                                    <td>{{ ucfirst($invoice->status) }}</td>
                                    <td>
                                        <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar factura?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $invoices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
