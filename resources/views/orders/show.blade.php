@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Pedido #{{ $order->id }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Usuario:</strong> {{ $order->user->name }}</p>
            <p><strong>Dirección ID:</strong> {{ $order->address_id }}</p>
            <p><strong>Cupón ID:</strong> {{ $order->coupon_id ?? 'N/A' }}</p>
            <p><strong>Método de Pago ID:</strong> {{ $order->payment_method_id ?? 'N/A' }}</p>
            <p><strong>Monto Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
@endsection
