@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Stock</h1>

    <form action="{{ route('stocks.update', $stock) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ old('cantidad', $stock->cantidad) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('stocks.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
