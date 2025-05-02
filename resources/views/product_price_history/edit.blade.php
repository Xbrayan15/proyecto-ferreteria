@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Historial de Precio</h1>
    <form action="{{ route('product_price_history.update', $productPriceHistory) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="product_id" class="form-label">Producto</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $productPriceHistory->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="precio_anterior" class="form-label">Precio Anterior</label>
            <input type="number" name="precio_anterior" class="form-control" step="0.01" value="{{ $productPriceHistory->precio_anterior }}" required>
        </div>

        <div class="mb-3">
            <label for="precio_nuevo" class="form-label">Precio Nuevo</label>
            <input type="number" name="precio_nuevo" class="form-control" step="0.01" value="{{ $productPriceHistory->precio_nuevo }}" required>
        </div>

        <div class="mb-3">
            <label for="cambiado_en" class="form-label">Fecha de Cambio</label>
            <input type="datetime-local" name="cambiado_en" class="form-control"
                value="{{ $productPriceHistory->cambiado_en ? $productPriceHistory->cambiado_en->format('Y-m-d\TH:i') : '' }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('product_price_history.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
