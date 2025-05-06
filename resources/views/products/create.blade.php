@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Crear Nuevo Producto</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="nombre" class="form-label fw-bold">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Ingrese el nombre del producto" required>
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="form-label fw-bold">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" placeholder="Ingrese una descripción del producto">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="sku" class="form-label fw-bold">SKU</label>
                            <input type="text" name="sku" id="sku" class="form-control" value="{{ old('sku') }}" placeholder="Ingrese el SKU del producto" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="precio" class="form-label fw-bold">Precio</label>
                                <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio') }}" step="0.01" placeholder="Ingrese el precio" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="stock" class="form-label fw-bold">Stock</label>
                                <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}" placeholder="Ingrese el stock disponible" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="form-label fw-bold">Categoría</label>
                            <select name="category_id" id="category_id" class="form-select">
                                <option value="">Seleccionar Categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="imagen" class="form-label fw-bold">Imagen del Producto</label>
                            <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror">
                            @error('imagen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
