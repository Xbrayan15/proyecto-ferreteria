@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Subcategorías</h1>
    <a href="{{ route('subcategories.create') }}" class="btn btn-primary mb-3">Crear Subcategoría</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $subcategory)
            <tr>
                <td>{{ $subcategory->id }}</td>
                <td>{{ $subcategory->nombre }}</td>
                <td>{{ $subcategory->category->nombre }}</td>
                <td>
                    <a href="{{ route('subcategories.show', $subcategory) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('subcategories.edit', $subcategory) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('subcategories.destroy', $subcategory) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta subcategoría?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
