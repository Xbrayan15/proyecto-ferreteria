@extends('layouts.app')

@section('content')
    <h1>Agregar Relación Producto - Impuesto</h1>

    <form action="{{ route('product-tax.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Producto</label>
            <select name="product_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tax_id" class="form-label">Impuesto</label>
            <select name="tax_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($taxes as $tax)
                    <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('product-tax.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
