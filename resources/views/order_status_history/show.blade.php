@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Historial de Estado</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $orderStatusHistory->id }}</p>
            <p><strong>Pedido:</strong> {{ $orderStatusHistory->order_id }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($orderStatusHistory->status) }}</p>
            <p><strong>Creado en:</strong> {{ $orderStatusHistory->created_at->format('Y-m-d H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('order-status-history.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
