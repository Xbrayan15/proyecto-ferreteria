@extends('layouts.app')

@section('content')
    <h1>Detalle Relación Producto - Impuesto</h1>

    <div class="mb-3">
        <strong>ID:</strong> {{ $productTax->id }}
    </div>
    <div class="mb-3">
        <strong>Producto:</strong> {{ $productTax->product->name }}
    </div>
    <div class="mb-3">
        <strong>Impuesto:</strong> {{ $productTax->tax->name }}
    </div>

    <a href="{{ route('product-tax.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('product-tax.edit', $productTax) }}" class="btn btn-warning">Editar</a>
@endsection
