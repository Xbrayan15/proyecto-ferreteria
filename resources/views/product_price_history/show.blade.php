@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Historial</h1>

    <p><strong>Producto:</strong> {{ $productPriceHistory->product->nombre }}</p>
    <p><strong>Precio Anterior:</strong> ${{ $productPriceHistory->precio_anterior }}</p>
    <p><strong>Precio Nuevo:</strong> ${{ $productPriceHistory->precio_nuevo }}</p>
    <p><strong>Fecha de Cambio:</strong> {{ $productPriceHistory->cambiado_en }}</p>

    <a href="{{ route('product_price_history.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
