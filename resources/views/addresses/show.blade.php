@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Dirección</h1>

    <div class="card">
        <div class="card-body">
            <h5>{{ $address->nombre ?? 'Sin nombre' }}</h5>
            <p><strong>Calle:</strong> {{ $address->calle }}</p>
            <p><strong>Barrio:</strong> {{ $address->barrio }}</p>
            <p><strong>Ciudad:</strong> {{ $address->ciudad }}</p>
            <p><strong>Departamento:</strong> {{ $address->departamento }}</p>
            <p><strong>País:</strong> {{ $address->pais }}</p>
            <p><strong>Código Postal:</strong> {{ $address->codigo_postal }}</p>
            <p><strong>Usuario:</strong> {{ $address->user->name ?? 'Sin usuario' }}</p>

            <a href="{{ route('addresses.edit', $address) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('addresses.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
