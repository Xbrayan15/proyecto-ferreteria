@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle Relación Producto - Impuesto</h1>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <strong>ID:</strong> {{ $productTax->id }}
                    </div>
                    <div class="mb-3">
                        <strong>Producto:</strong> {{ $productTax->product->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Impuesto:</strong> {{ $productTax->tax->name }}
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('product-tax.index') }}" class="btn btn-secondary px-4">Volver</a>
                        <a href="{{ route('product-tax.edit', $productTax) }}" class="btn btn-warning px-4">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
