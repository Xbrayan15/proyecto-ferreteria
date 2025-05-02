@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Movimiento de Stock</h1>

    <form action="{{ route('stock-movements.update', $stockMovement) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="product_id" class="form-label">Producto</label>
            <select name="product_id" class="form-select" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $stockMovement->product_id ? 'selected' : '' }}>
                        {{ $product->nombre }}
                    </option>
                @endforeach
            </select>
            @error('product_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" class="form-control" value="{{ $stockMovement->quantity }}" required>
            @error('quantity') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="movement_type" class="form-label">Tipo de Movimiento</label>
            <select name="movement_type" class="form-select" required>
                <option value="entrada" {{ $stockMovement->movement_type == 'entrada' ? 'selected' : '' }}>Entrada</option>
                <option value="salida" {{ $stockMovement->movement_type == 'salida' ? 'selected' : '' }}>Salida</option>
            </select>
            @error('movement_type') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" class="form-control" rows="3">{{ $stockMovement->description }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('stock-movements.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
