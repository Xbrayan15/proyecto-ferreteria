@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalles de Marca</h1>
                </div>
                <div class="card-body">
                    <p><strong>Marca:</strong> {{ $brand->nombre }}</p>
                    <p><strong>Creada en:</strong> {{ $brand->created_at }}</p>
                    <p><strong>Actualizada en:</strong> {{ $brand->updated_at }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('brands.index') }}" class="btn btn-secondary px-4">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
