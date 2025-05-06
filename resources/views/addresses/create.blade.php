@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Dirección</h1>

    <form action="{{ route('addresses.store') }}" method="POST">
        @csrf

            <input type="text" name="user_id" class="form-control" value="{{ Auth::user()->id }}" required hidden>

        <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ Auth::user()->name }}" required>
        </div>

        <div class="mb-3">
            <label for="calle">Calle</label>
            <input type="text" name="calle" class="form-control @error('calle') is-invalid @enderror" value="{{ old('calle') }}" required>
            @error('calle')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="barrio">Barrio</label>
            <input type="text" name="barrio" class="form-control @error('barrio') is-invalid @enderror" value="{{ old('barrio') }}" required>
            @error('barrio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ciudad">Ciudad</label>
            <input type="text" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror" value="{{ old('ciudad') }}" required>
            @error('ciudad')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="departamento">Departamento</label>
            <input type="text" name="departamento" class="form-control @error('departamento') is-invalid @enderror" value="{{ old('departamento') }}" required>
            @error('departamento')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="codigo_postal">Código Postal</label>
            <input type="text" name="codigo_postal" class="form-control @error('codigo_postal') is-invalid @enderror" value="{{ old('codigo_postal') }}" required>
            @error('codigo_postal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pais">País</label>
            <input type="text" name="pais" class="form-control @error('pais') is-invalid @enderror" value="{{ old('pais', 'Colombia') }}" required>
            @error('pais')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('addresses.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
