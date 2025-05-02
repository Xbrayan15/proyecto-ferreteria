@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Dirección</h1>

    <form action="{{ route('addresses.update', $address) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id">Usuario</label>
            <select name="user_id" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $address->user_id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $address->nombre) }}">
        </div>

        <div class="mb-3">
            <label for="calle">Calle</label>
            <input type="text" name="calle" class="form-control" value="{{ old('calle', $address->calle) }}" required>
        </div>

        <div class="mb-3">
            <label for="barrio">Barrio</label>
            <input type="text" name="barrio" class="form-control" value="{{ old('barrio', $address->barrio) }}" required>
        </div>

        <div class="mb-3">
            <label for="ciudad">Ciudad</label>
            <input type="text" name="ciudad" class="form-control" value="{{ old('ciudad', $address->ciudad) }}" required>
        </div>

        <div class="mb-3">
            <label for="departamento">Departamento</label>
            <input type="text" name="departamento" class="form-control" value="{{ old('departamento', $address->departamento) }}" required>
        </div>

        <div class="mb-3">
            <label for="codigo_postal">Código Postal</label>
            <input type="text" name="codigo_postal" class="form-control" value="{{ old('codigo_postal', $address->codigo_postal) }}" required>
        </div>

        <div class="mb-3">
            <label for="pais">País</label>
            <input type="text" name="pais" class="form-control" value="{{ old('pais', $address->pais) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('addresses.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
