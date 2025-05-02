@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Historial de Precios</h1>
    <a href="{{ route('product_price_history.create') }}" class="btn btn-primary mb-3">Agregar cambio de precio</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio Anterior</th>
                <th>Precio Nuevo</th>
                <th>Fecha de Cambio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($histories as $history)
                <tr>
                    <td>{{ $history->product->nombre }}</td>
                    <td>${{ $history->precio_anterior }}</td>
                    <td>${{ $history->precio_nuevo }}</td>
                    <td>{{ $history->cambiado_en }}</td>
                    <td>
                        <a href="{{ route('product_price_history.show', $history) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('product_price_history.edit', $history) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('product_price_history.destroy', $history) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este historial?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
