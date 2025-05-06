@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Subir Imagen para el Producto</h1>
                </div>
                <div class="card-body p-4">
                    <h5 class="text-center mb-4">Producto: {{ $product->name }}</h5>
                    <form action="{{ route('product.images.store', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Seleccionar Imagen -->
                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">Selecciona la Imagen</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                            @error('image')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Establecer como Imagen Principal -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_main" id="is_main">
                                <label class="form-check-label fw-bold" for="is_main">
                                    Establecer como Imagen Principal
                                </label>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Subir Imagen</button>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
