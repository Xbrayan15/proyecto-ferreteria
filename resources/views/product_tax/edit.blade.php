@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Editar Relación Producto - Impuesto</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('product-tax.update', $productTax) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Producto -->
                        <div class="mb-4">
                            <label for="product_id" class="form-label fw-bold">Producto</label>
                            <select name="product_id" id="product_id" class="form-select" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $productTax->product_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Impuesto -->
                        <div class="mb-4">
                            <label for="tax_id" class="form-label fw-bold">Impuesto</label>
                            <select name="tax_id" id="tax_id" class="form-select" required>
                                @foreach($taxes as $tax)
                                    <option value="{{ $tax->id }}" {{ $productTax->tax_id == $tax->id ? 'selected' : '' }}>
                                        {{ $tax->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tax_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Actualizar</button>
                            <a href="{{ route('product-tax.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
