@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Marcas</h1>
    <a href="{{ route('brands.create') }}" class="btn btn-primary mb-3">Crear Marca</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->nombre }}</td>
                <td>
                    <a href="{{ route('brands.show', $brand) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('brands.edit', $brand) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('brands.destroy', $brand) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta marca?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
