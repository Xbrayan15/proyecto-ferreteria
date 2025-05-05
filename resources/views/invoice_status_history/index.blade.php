@extends('layouts.app')

@section('content')
    <h1>Historial de Estado de Facturas</h1>
    <a href="{{ route('invoice-status-history.create') }}">Crear nuevo</a>

    <table>
        <thead>
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
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('invoice-status-history.show', $item) }}">Ver</a>
                        <a href="{{ route('invoice-status-history.edit', $item) }}">Editar</a>
                        <form action="{{ route('invoice-status-history.destroy', $item) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminarlo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
