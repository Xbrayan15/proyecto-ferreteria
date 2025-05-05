@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Factura</h1>
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Pedido</label>
            <select name="order_id" class="form-control" required>
                @foreach ($orders as $order)
                <option value="{{ $order->id }}">Pedido #{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Usuario</label>
            <select name="user_id" class="form-control" required>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Método de Pago</label>
            <select name="payment_method_id" class="form-control" required>
                @foreach ($paymentMethods as $method)
                <option value="{{ $method->id }}">{{ $method->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Monto Total</label>
            <input type="number" name="total_amount" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="status" class="form-control" required>
                <option value="pending">Pendiente</option>
                <option value="paid">Pagado</option>
                <option value="cancelled">Cancelado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
