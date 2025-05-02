@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Impuesto</h1>

    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <p>{{ $tax->name }}</p>
    </div>

    <div class="mb-3">
        <label for="rate" class="form-label">Tasa (%)</label>
        <p>{{ $tax->rate }}%</p>
    </div>

    <a href="{{ route('taxes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
