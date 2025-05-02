@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Imagen del Producto: {{ $product->name }}</h1>

    <form action="{{ route('product.images.update', [$product->id, $image->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="is_main" class="form-label">¿Es Imagen Principal?</label>
            <select class="form-control" id="is_main" name="is_main">
                <option value="1" {{ $image->is_main ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$image->is_main ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
    </form>
</div>
@endsection
