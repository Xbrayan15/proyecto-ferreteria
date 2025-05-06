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

                    <!-- Order Items -->
                    <h4 class="mb-3">Productos del Pedido</h4>
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Back Button -->
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary px-4">Volver al listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
