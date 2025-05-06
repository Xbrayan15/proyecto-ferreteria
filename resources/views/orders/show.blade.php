@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle del Pedido #{{ $order->id }}</h1>
                </div>
                <div class="card-body">
                    <!-- Order Details -->
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>Usuario:</strong> {{ $order->user->name }}</li>
                        <li class="list-group-item"><strong>Dirección ID:</strong> {{ $order->address_id }}</li>
                        <li class="list-group-item"><strong>Cupón ID:</strong> {{ $order->coupon_id ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Método de Pago ID:</strong> {{ $order->payment_method_id ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Monto Total:</strong> ${{ number_format($order->total_amount, 2) }}</li>
                        <li class="list-group-item"><strong>Estado:</strong> {{ ucfirst($order->status) }}</li>
                        <li class="list-group-item"><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</li>
                    </ul>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Usuario:</strong> {{ $order->user->name }}</p>
            <p><strong>Dirección:</strong> {{ optional($order->address)->direccion ?? 'N/A' }}</p>
            <p><strong>Cupón:</strong> {{ optional($order->coupon)->code ?? 'N/A' }}</p>
            <p><strong>Método de Pago:</strong> {{ optional($order->paymentMethod)->nombre ?? 'N/A' }}</p>
            <p><strong>Monto Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <h4>Productos del Pedido</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->nombre }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
</div>
@endsection
