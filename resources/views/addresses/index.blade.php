@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Direcciones</h1>

    <a href="{{ route('addresses.create') }}" class="btn btn-primary mb-3">Nueva Dirección</a>

    @foreach ($addresses as $address)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $address->nombre ?? 'Sin nombre' }}</h5>
                <p>{{ $address->calle }}, {{ $address->barrio }}, {{ $address->ciudad }}</p>
                <p>{{ $address->departamento }}, {{ $address->pais }} - {{ $address->codigo_postal }}</p>
                <p><strong>Usuario:</strong> {{ $address->user->name ?? 'Sin usuario' }}</p>

                <a href="{{ route('addresses.show', $address) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('addresses.edit', $address) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('addresses.destroy', $address) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
