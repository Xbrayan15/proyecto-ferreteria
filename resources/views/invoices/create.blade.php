@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Crear Factura</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('invoices.store') }}" method="POST">
                        @csrf

                        <!-- Pedido -->
                        <div class="mb-4">
                            <label for="order_id" class="form-label fw-bold">Pedido</label>
                            <select name="order_id" id="order_id" class="form-select" required>
                                @foreach ($orders as $order)
                                    <option value="{{ $order->id }}">Pedido #{{ $order->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Usuario -->
                        <div class="mb-4">
                            <label for="user_id" class="form-label fw-bold">Usuario</label>
                            <select name="user_id" id="user_id" class="form-select" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Método de Pago -->
                        <div class="mb-4">
                            <label for="payment_method_id" class="form-label fw-bold">Método de Pago</label>
                            <select name="payment_method_id" id="payment_method_id" class="form-select" required>
                                @foreach ($paymentMethods as $method)
                                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Monto Total -->
                        <div class="mb-4">
                            <label for="total_amount" class="form-label fw-bold">Monto Total</label>
                            <input type="number" name="total_amount" id="total_amount" class="form-control" step="0.01" required>
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="status" class="form-label fw-bold">Estado</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="pending">Pendiente</option>
                                <option value="paid">Pagado</option>
                                <option value="cancelled">Cancelado</option>
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('invoices.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
