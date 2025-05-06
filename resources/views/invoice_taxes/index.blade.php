@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Impuestos de Facturas</h1>
                </div>
                <div class="card-body">
                    <!-- Create Button -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('invoice-taxes.create') }}" class="btn btn-success">Agregar Nuevo</a>
                    </div>

                    <!-- Table -->
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Factura</th>
                                <th>Impuesto</th>
                                <th>Monto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoiceTaxes as $invoiceTax)
                                <tr>
                                    <td>{{ $invoiceTax->id }}</td>
                                    <td>{{ $invoiceTax->invoice->id }}</td>
                                    <td>{{ $invoiceTax->tax->name }}</td>
                                    <td>${{ number_format($invoiceTax->amount, 2) }}</td>
                                    <td>
                                        <a href="{{ route('invoice-taxes.show', $invoiceTax) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('invoice-taxes.edit', $invoiceTax) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('invoice-taxes.destroy', $invoiceTax) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este impuesto?')">
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
                        {{ $invoiceTaxes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
