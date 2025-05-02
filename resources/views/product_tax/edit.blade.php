@extends('layouts.app')

@section('content')
    <h1>Editar Relación Producto - Impuesto</h1>

    <form action="{{ route('product-tax.update', $productTax) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="product_id" class="form-label">Producto</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $productTax->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tax_id" class="form-label">Impuesto</label>
            <select name="tax_id" class="form-control" required>
                @foreach($taxes as $tax)
                    <option value="{{ $tax->id }}" {{ $productTax->tax_id == $tax->id ? 'selected' : '' }}>
                        {{ $tax->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('product-tax.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
