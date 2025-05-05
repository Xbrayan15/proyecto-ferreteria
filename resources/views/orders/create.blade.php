@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Pedido</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <input type="number" name="user_id" id="user_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address_id" class="form-label">Dirección</label>
            <input type="number" name="address_id" id="address_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="coupon_id" class="form-label">Cupón (opcional)</label>
            <input type="number" name="coupon_id" id="coupon_id" class="form-control">
        </div>

        <div class="mb-3">
            <label for="payment_method_id" class="form-label">Método de Pago</label>
            <input type="number" name="payment_method_id" id="payment_method_id" class="form-control">
        </div>

        <div class="mb-3">
            <label for="total_amount" class="form-label">Monto Total</label>
            <input type="number" name="total_amount" id="total_amount" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-select" required>
                <option value="pending">Pendiente</option>
                <option value="processing">Procesando</option>
                <option value="completed">Completado</option>
                <option value="cancelled">Cancelado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
