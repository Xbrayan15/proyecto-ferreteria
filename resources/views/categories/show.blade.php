@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Categoría</h1>

    <div class="mb-3">
        <strong>ID:</strong> {{ $category->id }}
    </div>
    <div class="mb-3">
        <strong>Nombre:</strong> {{ $category->nombre }}
    </div>

    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
</div>
@endsection
