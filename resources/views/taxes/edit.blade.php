@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Impuesto</h1>

    <form action="{{ route('taxes.update', $tax) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $tax->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="rate" class="form-label">Tasa (%)</label>
            <input type="number" name="rate" id="rate" class="form-control" value="{{ old('rate', $tax->rate) }}" min="0" max="100" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('taxes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
