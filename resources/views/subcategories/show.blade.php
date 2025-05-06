@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalles de Subcategoría</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>Subcategoría:</strong> {{ $subcategory->nombre }}</li>
                        <li class="list-group-item"><strong>Categoría:</strong> {{ $subcategory->category->nombre }}</li>
                        <li class="list-group-item"><strong>Creada en:</strong> {{ $subcategory->created_at->format('d/m/Y H:i') }}</li>
                        <li class="list-group-item"><strong>Actualizada en:</strong> {{ $subcategory->updated_at->format('d/m/Y H:i') }}</li>
                    </ul>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('subcategories.index') }}" class="btn btn-secondary px-4">Volver al listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
