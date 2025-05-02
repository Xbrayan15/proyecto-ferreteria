@extends('layouts.app')

@section('content')
    <h1>Relaciones Producto - Impuesto</h1>

    <a href="{{ route('product-tax.create') }}" class="btn btn-primary mb-3">Agregar Relación</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Impuesto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productTaxes as $relation)
                <tr>
                    <td>{{ $relation->id }}</td>
                    <td>{{ $relation->product->name }}</td>
                    <td>{{ $relation->tax->name }}</td>
                    <td>
                        <a href="{{ route('product-tax.show', $relation) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('product-tax.edit', $relation) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('product-tax.destroy', $relation) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta relación?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
