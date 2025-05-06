@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Historial de Precios</h1>
                </div>
                <div class="card-body p-4">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Create Button -->
                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('product_price_history.create') }}" class="btn btn-success">Agregar Cambio de Precio</a>
                    </div>

                    <!-- Table -->
                    <table class="table table-striped">
                        <thead class="table-dark">
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
                                    <td>${{ number_format($history->precio_anterior, 2) }}</td>
                                    <td>${{ number_format($history->precio_nuevo, 2) }}</td>
                                    <td>{{ $history->cambiado_en }}</td>
                                    <td>
                                        <a href="{{ route('product_price_history.show', $history) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('product_price_history.edit', $history) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('product_price_history.destroy', $history) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este historial?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $histories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
