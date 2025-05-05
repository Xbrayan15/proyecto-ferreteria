@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Pedido #{{ $order->id }}</h1>

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <input type="number" name="user_id" id="user_id" value="{{ $order->user_id }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address_id" class="form-label">Dirección</label>
            <input type="number" name="address_id" id="address_id" value="{{ $order->address_id }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="coupon_id" class="form-label">Cupón</label>
            <input type="number" name="coupon_id" id="coupon_id" value="{{ $order->coupon_id }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="payment_method_id" class="form-label">Método de Pago</label>
            <input type="number" name="payment_method_id" id="payment_method_id" value="{{ $order->payment_method_id }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="total_amount" class="form-label">Monto Total</label>
            <input type="number" name="total_amount" id="total_amount" value="{{ $order->total_amount }}" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-select" required>
                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Procesando</option>
                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completado</option>
                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
