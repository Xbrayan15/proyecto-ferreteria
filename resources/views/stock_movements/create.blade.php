@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Registrar Movimiento de Stock</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('stock-movements.store') }}" method="POST">
                        @csrf

                        <!-- Producto -->
                        <div class="mb-4">
                            <label for="product_id" class="form-label fw-bold">Producto</label>
                            <select name="product_id" id="product_id" class="form-select" required>
                                <option value="">-- Selecciona un producto --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->nombre }}</option>
                                @endforeach
                            </select>
                            @error('product_id') 
                                <div class="text-danger mt-2">{{ $message }}</div> 
                            @enderror
                        </div>

                        <!-- Cantidad -->
                        <div class="mb-4">
                            <label for="quantity" class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required>
                            @error('quantity') 
                                <div class="text-danger mt-2">{{ $message }}</div> 
                            @enderror
                        </div>

                        <!-- Tipo de Movimiento -->
                        <div class="mb-4">
                            <label for="movement_type" class="form-label fw-bold">Tipo de Movimiento</label>
                            <select name="movement_type" id="movement_type" class="form-select" required>
                                <option value="entrada">Entrada</option>
                                <option value="salida">Salida</option>
                            </select>
                            @error('movement_type') 
                                <div class="text-danger mt-2">{{ $message }}</div> 
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold">Descripción (opcional)</label>
                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                            @error('description') 
                                <div class="text-danger mt-2">{{ $message }}</div> 
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('stock-movements.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
