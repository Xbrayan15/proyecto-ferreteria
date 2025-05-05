@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Historial de Estados de Pedido</h1>
    <a href="{{ route('order-status-history.create') }}" class="btn btn-primary mb-3">Crear nuevo historial</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pedido</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($histories as $history)
                <tr>
                    <td>{{ $history->id }}</td>
                    <td>{{ $history->order_id }}</td>
                    <td>{{ ucfirst($history->status) }}</td>
                    <td>{{ $history->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('order-status-history.show', $history) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('order-status-history.edit', $history) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('order-status-history.destroy', $history) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Eliminar este historial?')" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
