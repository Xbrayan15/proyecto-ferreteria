@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Editar Imagen del Producto</h1>
                </div>
                <div class="card-body p-4">
                    <h5 class="text-center mb-4">Producto: {{ $product->name }}</h5>
                    <form action="{{ route('product.images.update', [$product->id, $image->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- ¿Es Imagen Principal? -->
                        <div class="mb-4">
                            <label for="is_main" class="form-label fw-bold">¿Es Imagen Principal?</label>
                            <select class="form-select" id="is_main" name="is_main">
                                <option value="1" {{ $image->is_main ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ !$image->is_main ? 'selected' : '' }}>No</option>
                            </select>
                            @error('is_main')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Actualizar Imagen</button>
                            <a href="{{ route('product.images.index', $product->id) }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
