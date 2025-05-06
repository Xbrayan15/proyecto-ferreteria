@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Métodos de Pago</h1>
                </div>
                <div class="card-body p-4">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Create Button -->
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ route('payment_methods.create') }}" class="btn btn-success">Crear Nuevo Método</a>
                    </div>

                    <!-- Table -->
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($methods as $method)
                                <tr>
                                    <td>{{ $method->id }}</td>
                                    <td>{{ $method->name }}</td>
                                    <td>
                                        <a href="{{ route('payment_methods.show', $method) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('payment_methods.edit', $method) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('payment_methods.destroy', $method) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Estás seguro?')" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $methods->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
