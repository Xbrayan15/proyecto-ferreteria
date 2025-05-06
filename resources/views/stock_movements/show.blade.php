@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle del Movimiento de Stock</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>Producto:</strong> {{ $stockMovement->product->nombre }}</li>
                        <li class="list-group-item"><strong>Cantidad:</strong> {{ $stockMovement->quantity }}</li>
                        <li class="list-group-item"><strong>Tipo:</strong> {{ ucfirst($stockMovement->movement_type) }}</li>
                        <li class="list-group-item"><strong>Descripción:</strong> {{ $stockMovement->description ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Fecha:</strong> {{ $stockMovement->created_at->format('d/m/Y H:i') }}</li>
                    </ul>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('stock-movements.index') }}" class="btn btn-secondary px-4">Volver al listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
