@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle de Factura #{{ $invoice->id }}</h1>
                </div>
                <div class="card-body">
                    <p><strong>Pedido:</strong> #{{ $invoice->order_id }}</p>
                    <p><strong>Usuario:</strong> {{ $invoice->user->name }}</p>
                    <p><strong>Método de Pago:</strong> {{ $invoice->paymentMethod->name }}</p>
                    <p><strong>Total:</strong> ${{ number_format($invoice->total_amount, 2) }}</p>
                    <p><strong>Estado:</strong> {{ ucfirst($invoice->status) }}</p>
                    <p><strong>Creada en:</strong> {{ $invoice->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('invoices.index') }}" class="btn btn-secondary px-4">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
