@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Crear Ítem de Factura</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('invoice-items.store') }}" method="POST">
                        @csrf

                        <!-- Factura -->
                        <div class="mb-4">
                            <label for="invoice_id" class="form-label fw-bold">Factura</label>
                            <select name="invoice_id" id="invoice_id" class="form-select" required>
                                @foreach ($invoices as $invoice)
                                    <option value="{{ $invoice->id }}">{{ $invoice->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Producto -->
                        <div class="mb-4">
                            <label for="product_id" class="form-label fw-bold">Producto</label>
                            <select name="product_id" id="product_id" class="form-select" required>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Cantidad -->
                        <div class="mb-4">
                            <label for="quantity" class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required>
                        </div>

                        <!-- Precio -->
                        <div class="mb-4">
                            <label for="price" class="form-label fw-bold">Precio</label>
                            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('invoice-items.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
