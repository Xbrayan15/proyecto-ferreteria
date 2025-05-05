@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Factura #{{ $invoice->id }}</h1>

    <p><strong>Pedido:</strong> #{{ $invoice->order_id }}</p>
    <p><strong>Usuario:</strong> {{ $invoice->user->name }}</p>
    <p><strong>Método de Pago:</strong> {{ $invoice->paymentMethod->name }}</p>
    <p><strong>Total:</strong> ${{ $invoice->total_amount }}</p>
    <p><strong>Estado:</strong> {{ ucfirst($invoice->status) }}</p>
    <p><strong>Creada en:</strong> {{ $invoice->created_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
