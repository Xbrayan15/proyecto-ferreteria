@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Carritos de Compra</h1>
                </div>
                <div class="card-body">
                    <!-- Create Button -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('shopping-carts.create') }}" class="btn btn-success">Crear Carrito</a>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Table -->
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Fecha de Creación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                                <tr>
                                    <td>{{ $cart->id }}</td>
                                    <td>{{ $cart->user->name }}</td>
                                    <td>{{ $cart->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('shopping-carts.show', $cart) }}" class="btn btn-sm btn-info">Ver</a>
                                        <a href="{{ route('shopping-carts.edit', $cart) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('shopping-carts.destroy', $cart) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro?')">
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
                        {{ $carts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
