@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Movimientos de Stock</h1>

    <a href="{{ route('stock-movements.create') }}" class="btn btn-primary mb-3">Registrar nuevo movimiento</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($movements->isEmpty())
        <p>No hay movimientos registrados.</p>
    @else
        <table class="table table-bordered">
            <thead>
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
                            <form action="{{ route('stock-movements.destroy', $movement) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este movimiento?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $movements->links() }}
    @endif
</div>
@endsection
