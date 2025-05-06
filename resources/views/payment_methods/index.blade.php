@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Métodos de Pago</h1>
                </div>
                <div class="card-body">
                    <!-- Botón Crear Nuevo Método -->
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('payment_methods.create') }}" class="btn btn-success">Crear Nuevo Método</a>
                    </div>

                    <!-- Mensaje de Éxito -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tabla de Métodos de Pago -->
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($paymentMethods as $method)
                                <tr>
                                    <td>{{ $method->id }}</td>
                                    <td>{{ $method->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('payment_methods.show', $method) }}" class="btn btn-info btn-sm me-1">Ver</a>
                                        <a href="{{ route('payment_methods.edit', $method) }}" class="btn btn-warning btn-sm me-1">Editar</a>
                                        <form action="{{ route('payment_methods.destroy', $method) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este método?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No hay métodos de pago registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
