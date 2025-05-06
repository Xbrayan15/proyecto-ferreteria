@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Métodos de Pago</h1>
                </div>
                <div class="card-body">
                    <!-- Create Button -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('payment_methods.create') }}" class="btn btn-success">Crear Método de Pago</a>
                    </div>

                    <!-- Table -->
                    @if($paymentMethods->isEmpty())
                        <p class="text-muted">No hay métodos de pago registrados.</p>
                    @else
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paymentMethods as $paymentMethod)
                                    <tr>
                                        <td>{{ $paymentMethod->id }}</td>
                                        <td>{{ $paymentMethod->name }}</td>
                                        <td>
                                            <a href="{{ route('payment_methods.edit', $paymentMethod) }}" class="btn btn-sm btn-warning">Editar</a>
                                            <form action="{{ route('payment_methods.destroy', $paymentMethod) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este método de pago?')">
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
                            {{ $paymentMethods->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
