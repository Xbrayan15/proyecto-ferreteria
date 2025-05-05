@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Factura</h1>
    <form action="{{ route('invoices.update', $invoice) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Pedido</label>
            <select name="order_id" class="form-control">
                @foreach ($orders as $order)
                <option value="{{ $order->id }}" {{ $invoice->order_id == $order->id ? 'selected' : '' }}>
                    Pedido #{{ $order->id }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Usuario</label>
            <select name="user_id" class="form-control">
                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $invoice->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Método de Pago</label>
            <select name="payment_method_id" class="form-control">
                @foreach ($paymentMethods as $method)
                <option value="{{ $method->id }}" {{ $invoice->payment_method_id == $method->id ? 'selected' : '' }}>
                    {{ $method->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Monto Total</label>
            <input type="number" name="total_amount" class="form-control" value="{{ $invoice->total_amount }}" step="0.01">
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="status" class="form-control">
                @foreach (['pending', 'paid', 'cancelled'] as $status)
                <option value="{{ $status }}" {{ $invoice->status === $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
