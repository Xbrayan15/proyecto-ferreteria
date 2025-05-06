@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle de Ítem de Factura</h1>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $invoiceItem->id }}</p>
                    <p><strong>Factura ID:</strong> {{ $invoiceItem->invoice->id }}</p>
                    <p><strong>Producto:</strong> {{ $invoiceItem->product->name }}</p>
                    <p><strong>Cantidad:</strong> {{ $invoiceItem->quantity }}</p>
                    <p><strong>Precio:</strong> ${{ number_format($invoiceItem->price, 2) }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('invoice-items.index') }}" class="btn btn-secondary px-4">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
