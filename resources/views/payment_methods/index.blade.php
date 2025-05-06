@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Métodos de Pago</h1>

    <a href="{{ route('payment_methods.create') }}" class="btn btn-primary mb-3">Crear nuevo método</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paymentMethods as $method)
                <tr>
                    <td>{{ $method->id }}</td>
                    <td>{{ $method->name }}</td>
                    <td>
                        <a href="{{ route('payment_methods.show', $method) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('payment_methods.edit', $method) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('payment_methods.destroy', $method) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este método?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
