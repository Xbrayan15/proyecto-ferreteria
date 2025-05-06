@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Editar Producto</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('products.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="nombre" class="form-label fw-bold">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $product->nombre) }}" placeholder="Ingrese el nombre del producto" required>
                            @error('nombre')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="descripcion" class="form-label fw-bold">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="4" placeholder="Ingrese una descripción del producto">{{ old('descripcion', $product->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- SKU -->
                        <div class="mb-4">
                            <label for="sku" class="form-label fw-bold">SKU</label>
                            <input type="text" name="sku" class="form-control" value="{{ old('sku', $product->sku) }}" placeholder="Ingrese el SKU del producto" required>
                            @error('sku')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Precio y Stock -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="precio" class="form-label fw-bold">Precio</label>
                                <input type="number" name="precio" step="0.01" class="form-control" value="{{ old('precio', $product->precio) }}" placeholder="Ingrese el precio" required>
                                @error('precio')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="stock" class="form-label fw-bold">Stock</label>
                                <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" placeholder="Ingrese el stock disponible" required>
                                @error('stock')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Categoría -->
                        <div class="mb-4">
                            <label for="category_id" class="form-label fw-bold">Categoría</label>
                            <select name="category_id" class="form-select">
                                <option value="">Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Subcategoría -->
                        <div class="mb-4">
                            <label for="subcategory_id" class="form-label fw-bold">Subcategoría</label>
                            <select name="subcategory_id" class="form-select">
                                <option value="">Selecciona una subcategoría</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>
                                        {{ $subcategory->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Marca -->
                        <div class="mb-4">
                            <label for="brand_id" class="form-label fw-bold">Marca</label>
                            <select name="brand_id" class="form-select">
                                <option value="">Selecciona una marca</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                        {{ $brand->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Impuesto -->
                        <div class="mb-4">
                            <label for="tax_id" class="form-label fw-bold">Impuesto</label>
                            <select name="tax_id" class="form-select">
                                <option value="">Selecciona un impuesto</option>
                                @foreach($taxes as $tax)
                                    <option value="{{ $tax->id }}" {{ $tax->id == $product->tax_id ? 'selected' : '' }}>
                                        {{ $tax->nombre }} - {{ $tax->rate }}%
                                    </option>
                                @endforeach
                            </select>
                            @error('tax_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Actualizar</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
