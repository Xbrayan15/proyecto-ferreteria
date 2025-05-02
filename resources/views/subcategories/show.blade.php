@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Subcategoría</h1>

    <div class="card">
        <div class="card-header">
            Subcategoría: {{ $subcategory->nombre }}
        </div>
        <div class="card-body">
            <p><strong>Categoría:</strong> {{ $subcategory->category->nombre }}</p>
            <p><strong>Creada en:</strong> {{ $subcategory->created_at }}</p>
            <p><strong>Actualizada en:</strong> {{ $subcategory->updated_at }}</p>
        </div>
    </div>

    <a href="{{ route('subcategories.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
