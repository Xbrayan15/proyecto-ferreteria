@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Historial de Estado de Facturas</h1>
                </div>
                <div class="card-body">
                    <!-- Create Button -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('invoice-status-history.create') }}" class="btn btn-success">Crear Nuevo</a>
                    </div>

                    <!-- Table -->
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Factura</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->invoice->id }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('invoice-status-history.show', $item) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('invoice-status-history.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('invoice-status-history.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminarlo?')">
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
                        {{ $history->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
