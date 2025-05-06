@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Movimientos de Stock</h1>
                </div>
                <div class="card-body">
                    <!-- Create Button -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('stock-movements.create') }}" class="btn btn-success">Registrar nuevo movimiento</a>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Table -->
                    @if($movements->isEmpty())
                        <p class="text-muted">No hay movimientos registrados.</p>
                    @else
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Tipo</th>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($movements as $movement)
                                    <tr>
                                        <td>{{ $movement->product->nombre }}</td>
                                        <td>{{ $movement->quantity }}</td>
                                        <td>{{ ucfirst($movement->movement_type) }}</td>
                                        <td>{{ $movement->description }}</td>
                                        <td>{{ $movement->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('stock-movements.show', $movement) }}" class="btn btn-sm btn-info">Ver</a>
                                            <a href="{{ route('stock-movements.edit', $movement) }}" class="btn btn-sm btn-warning">Editar</a>
                                            <form action="{{ route('stock-movements.destroy', $movement) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este movimiento?')">
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
                            {{ $movements->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
