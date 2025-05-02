@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Stock</h1>

    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <p>{{ $stock->cantidad }}</p>
    </div>

    <a href="{{ route('stocks.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
