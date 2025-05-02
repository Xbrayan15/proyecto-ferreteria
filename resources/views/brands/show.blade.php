@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Marca</h1>

    <div class="card">
        <div class="card-header">
            Marca: {{ $brand->nombre }}
        </div>
        <div class="card-body">
            <p><strong>Creada en:</strong> {{ $brand->created_at }}</p>
            <p><strong>Actualizada en:</strong> {{ $brand->updated_at }}</p>
        </div>
    </div>

    <a href="{{ route('brands.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
