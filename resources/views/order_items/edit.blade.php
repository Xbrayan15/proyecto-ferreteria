@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Ítem de Pedido</h1>

    <form action="{{ route('order-items.update', $orderItem) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="order_id" class="form-label">Pedido</label>
            <select name="order_id" id="order_id" class="form-control" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}" @selected($orderItem->order_id == $order->id)>
                        {{ $order->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Producto</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" @selected($orderItem->product_id == $product->id)>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required value="{{ $orderItem->quantity }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" name="price" id="price" class="form-control" required step="0.01" value="{{ $orderItem->price }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('order-items.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
