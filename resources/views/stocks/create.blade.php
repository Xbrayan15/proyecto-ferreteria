@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Stock</h1>

    <form action="{{ route('stocks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ old('cantidad') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('stocks.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
