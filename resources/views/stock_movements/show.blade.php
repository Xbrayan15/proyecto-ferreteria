@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Movimiento</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Producto:</strong> {{ $stockMovement->product->nombre }}</p>
            <p><strong>Cantidad:</strong> {{ $stockMovement->quantity }}</p>
            <p><strong>Tipo:</strong> {{ ucfirst($stockMovement->movement_type) }}</p>
            <p><strong>Descripción:</strong> {{ $stockMovement->description ?? 'N/A' }}</p>
            <p><strong>Fecha:</strong> {{ $stockMovement->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('stock-movements.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
</div>
@endsection
