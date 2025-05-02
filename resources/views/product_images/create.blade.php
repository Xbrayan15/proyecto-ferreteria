@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Subir Imagen para el Producto: {{ $product->name }}</h1>

    <form action="{{ route('product.images.store', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Selecciona la Imagen</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_main" id="is_main">
                <label class="form-check-label" for="is_main">
                    Establecer como Imagen Principal
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Subir Imagen</button>
    </form>
</div>
@endsection
