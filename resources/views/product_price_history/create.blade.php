@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Agregar Historial de Precio</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('product_price_history.store') }}" method="POST">
                        @csrf

                        <!-- Producto -->
                        <div class="mb-4">
                            <label for="product_id" class="form-label fw-bold">Producto</label>
                            <select name="product_id" id="product_id" class="form-select" required>
                                <option value="">Seleccione un producto</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->nombre }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Precio Anterior -->
                        <div class="mb-4">
                            <label for="precio_anterior" class="form-label fw-bold">Precio Anterior</label>
                            <input type="number" name="precio_anterior" id="precio_anterior" class="form-control" step="0.01" placeholder="Ingrese el precio anterior" required>
                            @error('precio_anterior')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Precio Nuevo -->
                        <div class="mb-4">
                            <label for="precio_nuevo" class="form-label fw-bold">Precio Nuevo</label>
                            <input type="number" name="precio_nuevo" id="precio_nuevo" class="form-control" step="0.01" placeholder="Ingrese el precio nuevo" required>
                            @error('precio_nuevo')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha de Cambio -->
                        <div class="mb-4">
                            <label for="cambiado_en" class="form-label fw-bold">Fecha de Cambio</label>
                            <input type="datetime-local" name="cambiado_en" id="cambiado_en" class="form-control">
                            @error('cambiado_en')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('product_price_history.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
