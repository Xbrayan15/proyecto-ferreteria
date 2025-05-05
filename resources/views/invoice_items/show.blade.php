@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Ítem de Factura</h1>

    <p><strong>ID:</strong> {{ $invoiceItem->id }}</p>
    <p><strong>Factura ID:</strong> {{ $invoiceItem->invoice->id }}</p>
    <p><strong>Producto:</strong> {{ $invoiceItem->product->name }}</p>
    <p><strong>Cantidad:</strong> {{ $invoiceItem->quantity }}</p>
    <p><strong>Precio:</strong> ${{ number_format($invoiceItem->price, 2) }}</p>

    <a href="{{ route('invoice-items.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
