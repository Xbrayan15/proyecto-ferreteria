@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Editar Pedido #{{ $order->id }}</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('orders.update', $order) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Usuario -->
                        <div class="mb-4">
                            <label for="user_id" class="form-label fw-bold">Usuario</label>
                            <input type="number" name="user_id" id="user_id" value="{{ $order->user_id }}" class="form-control" required>
                        </div>

                        <!-- Dirección -->
                        <div class="mb-4">
                            <label for="address_id" class="form-label fw-bold">Dirección</label>
                            <input type="number" name="address_id" id="address_id" value="{{ $order->address_id }}" class="form-control" required>
                        </div>

                        <!-- Cupón -->
                        <div class="mb-4">
                            <label for="coupon_id" class="form-label fw-bold">Cupón</label>
                            <input type="number" name="coupon_id" id="coupon_id" value="{{ $order->coupon_id }}" class="form-control">
                        </div>

                        <!-- Método de Pago -->
                        <div class="mb-4">
                            <label for="payment_method_id" class="form-label fw-bold">Método de Pago</label>
                            <input type="number" name="payment_method_id" id="payment_method_id" value="{{ $order->payment_method_id }}" class="form-control">
                        </div>

                        <!-- Monto Total -->
                        <div class="mb-4">
                            <label for="total_amount" class="form-label fw-bold">Monto Total</label>
                            <input type="number" name="total_amount" id="total_amount" value="{{ $order->total_amount }}" step="0.01" class="form-control" required>
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="status" class="form-label fw-bold">Estado</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Procesando</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completado</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Actualizar</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
