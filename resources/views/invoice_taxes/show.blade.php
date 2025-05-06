@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle del Impuesto de Factura</h1>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $invoiceTax->id }}</p>
                    <p><strong>Factura ID:</strong> {{ $invoiceTax->invoice->id }}</p>
                    <p><strong>Impuesto:</strong> {{ $invoiceTax->tax->name }}</p>
                    <p><strong>Monto:</strong> ${{ number_format($invoiceTax->amount, 2) }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('invoice-taxes.edit', $invoiceTax) }}" class="btn btn-warning px-4">Editar</a>
                    <a href="{{ route('invoice-taxes.index') }}" class="btn btn-secondary px-4">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
