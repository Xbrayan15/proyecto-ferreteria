@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Confirmar Pedido</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($cart->cartItems->isEmpty())
        <p>No hay productos en tu carrito.</p>
    @else
        <form method="POST" action="{{ route('cart-items.checkout') }}">
            @csrf

            <div class="mb-3">
                <label for="address_id" class="form-label">Dirección</label>
                <select name="address_id" class="form-select" required>
                    @foreach($addresses as $address)
                        <option value="{{ $address->id }}">{{ $address->direccion_completa }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="payment_method_id" class="form-label">Método de Pago</label>
                <select name="payment_method_id" class="form-select" required>
                    @foreach($paymentMethods as $method)
                        <option value="{{ $method->id }}">{{ $method->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <h4>Resumen del Carrito</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart->cartItems as $item)
                        @php $subtotal = $item->product->price * $item->quantity; @endphp
                        @php $total += $subtotal; @endphp
                        <tr>
                            <td>{{ $item->product->nombre }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->product->price, 2) }}</td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td><strong>${{ number_format($total, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-success">Realizar Pedido</button>
            <a href="{{ route('cart-items.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    @endif
</div>
@endsection
