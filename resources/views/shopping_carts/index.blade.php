@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Carritos de Compra</h1>

    <a href="{{ route('shopping-carts.create') }}" class="btn btn-primary mb-3">Crear Carrito</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
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
                        <a href="{{ route('shopping-carts.show', $cart) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('shopping-carts.edit', $cart) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('shopping-carts.destroy', $cart) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
