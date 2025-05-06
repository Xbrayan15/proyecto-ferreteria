@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle del Ítem de Pedido #{{ $orderItem->id }}</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>Pedido:</strong> #{{ $orderItem->order_id }}</li>
                        <li class="list-group-item"><strong>Producto:</strong> {{ $orderItem->product->name ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Cantidad:</strong> {{ $orderItem->quantity }}</li>
                        <li class="list-group-item"><strong>Precio:</strong> ${{ number_format($orderItem->price, 2) }}</li>
                        <li class="list-group-item"><strong>Creado:</strong> {{ $orderItem->created_at->format('d/m/Y H:i') }}</li>
                        <li class="list-group-item"><strong>Actualizado:</strong> {{ $orderItem->updated_at->format('d/m/Y H:i') }}</li>
                    </ul>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('order-items.edit', $orderItem) }}" class="btn btn-warning px-4">Editar</a>
                        <a href="{{ route('order-items.index') }}" class="btn btn-secondary px-4">Volver al listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
