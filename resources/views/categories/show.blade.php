@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalles de la Categoría</h1>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $category->id }}</p>
                    <p><strong>Nombre:</strong> {{ $category->nombre }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary px-4">Volver</a>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning px-4">Editar</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger px-4">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
