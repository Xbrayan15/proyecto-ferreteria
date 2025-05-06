@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle del Historial de Precio</h1>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <strong>Producto:</strong> {{ $productPriceHistory->product->nombre }}
                    </div>
                    <div class="mb-3">
                        <strong>Precio Anterior:</strong> ${{ number_format($productPriceHistory->precio_anterior, 2) }}
                    </div>
                    <div class="mb-3">
                        <strong>Precio Nuevo:</strong> ${{ number_format($productPriceHistory->precio_nuevo, 2) }}
                    </div>
                    <div class="mb-3">
                        <strong>Fecha de Cambio:</strong> {{ $productPriceHistory->cambiado_en }}
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('product_price_history.index') }}" class="btn btn-secondary px-4">Volver</a>
                        <a href="{{ route('product_price_history.edit', $productPriceHistory) }}" class="btn btn-warning px-4">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection