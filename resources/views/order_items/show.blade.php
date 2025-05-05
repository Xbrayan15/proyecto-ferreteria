@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Ítem de Pedido #{{ $orderItem->id }}</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Pedido:</strong> #{{ $orderItem->order_id }}</li>
        <li class="list-group-item"><strong>Producto:</strong> {{ $orderItem->product->name ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Cantidad:</strong> {{ $orderItem->quantity }}</li>
        <li class="list-group-item"><strong>Precio:</strong> ${{ number_format($orderItem->price, 2) }}</li>
        <li class="list-group-item"><strong>Creado:</strong> {{ $orderItem->created_at }}</li>
        <li class="list-group-item"><strong>Actualizado:</strong> {{ $orderItem->updated_at }}</li>
    </ul>

    <a href="{{ route('order-items.edit', $orderItem) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('order-items.index') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection
