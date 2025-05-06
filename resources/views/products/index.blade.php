@extends('layouts.app')

@section('content')
        
<div class="container py-5 position-relative">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 position-relative">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Listado de Productos</h1>
                </div>
                <div class="card-body p-4">
                    <!-- Success Message -->
                    

                    <!-- Products List -->
                    @foreach ($products as $index => $product)
                        <div class="mb-4 shadow-sm">
                            <div class="row g-0">
                                <!-- Alternar posición de la imagen -->
                                @if($index % 2 == 0)
                                    <div class="col-md-4">
                                        <img src="{{ $product->imagen ?? asset('images/default-product.png') }}" 
                                             class="img-fluid rounded-start w-100 h-100" 
                                             alt="{{ $product->nombre }}" 
                                             style="object-fit: cover;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="p-3">
                                            <h5 class="text-primary">{{ $product->nombre }}</h5>
                                            <h6 class="text-muted">SKU: {{ $product->sku }}</h6>
                                            <p>
                                                <strong>Precio:</strong> ${{ number_format($product->precio, 2) }}<br>
                                                <strong>Stock:</strong> {{ $product->stock }}
                                            </p>
                                            <div class="d-flex justify-content-start">
                                                <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm me-2">Ver</a>
                                                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-8">
                                        <div class="p-3">
                                            <h5 class="text-primary">{{ $product->nombre }}</h5>
                                            <h6 class="text-muted">SKU: {{ $product->sku }}</h6>
                                            <p>
                                                <strong>Precio:</strong> ${{ number_format($product->precio, 2) }}<br>
                                                <strong>Stock:</strong> {{ $product->stock }}
                                            </p>
                                            <div class="d-flex justify-content-start">
                                                <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm me-2">Ver</a>
                                                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ $product->imagen ?? asset('images/default-product.png') }}" 
                                             class="img-fluid rounded-end w-100 h-100" 
                                             alt="{{ $product->nombre }}" 
                                             style="object-fit: cover;">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>

                <!-- Create Button -->
                <a href="{{ route('products.create') }}" class="btn btn-success position-absolute" style="bottom: 20px; right: 20px;">
                    Crear Nuevo Producto
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
