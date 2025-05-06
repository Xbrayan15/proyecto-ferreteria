@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Crear Ítem de Pedido</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('order-items.store') }}" method="POST">
                        @csrf

                        <!-- Pedido -->
                        <div class="mb-4">
                            <label for="order_id" class="form-label fw-bold">Pedido</label>
                            <select name="order_id" id="order_id" class="form-select" required>
                                @foreach($orders as $order)
                                    <option value="{{ $order->id }}">{{ $order->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Producto -->
                        <div class="mb-4">
                            <label for="product_id" class="form-label fw-bold">Producto</label>
                            <select name="product_id" id="product_id" class="form-select" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Cantidad -->
                        <div class="mb-4">
                            <label for="quantity" class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
                        </div>

                        <!-- Precio -->
                        <div class="mb-4">
                            <label for="price" class="form-label fw-bold">Precio</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01" required min="0">
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('order-items.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
