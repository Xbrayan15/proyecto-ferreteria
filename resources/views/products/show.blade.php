@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle del Producto</h1>
                </div>
                <div class="card-body p-4">
                    <!-- Imagen del producto -->
                    <div class="text-center mb-4">
                        @if($product->imagen)
                            <img src="{{ $product->imagen }}" class="img-fluid rounded" alt="{{ $product->nombre }}" style="max-height: 300px;">
                        @else
                            <img src="{{ asset('images/default-product.png') }}" class="img-fluid rounded" alt="Producto sin imagen" style="max-height: 300px;">
                        @endif
                    </div>

                    <!-- Detalles del producto -->
                    <h3 class="card-title text-center">{{ $product->nombre }}</h3>
                    <p><strong>Descripción:</strong> {{ $product->descripcion }}</p>
                    <p><strong>SKU:</strong> {{ $product->sku }}</p>
                    <p><strong>Precio:</strong> ${{ number_format($product->precio, 2) }}</p>
                    <p><strong>Stock:</strong> {{ $product->stock }}</p>
                    <p><strong>Categoría:</strong> {{ $product->category?->nombre ?? 'N/A' }}</p>
                    <p><strong>Subcategoría:</strong> {{ $product->subcategory?->nombre ?? 'N/A' }}</p>
                    <p><strong>Marca:</strong> {{ $product->brand?->nombre ?? 'N/A' }}</p>
                    <p><strong>Impuesto:</strong> {{ $product->tax?->name ?? 'N/A' }} ({{ $product->tax?->rate ?? 0 }}%)</p>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver al listado</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Editar</a>
                    </div>
                </div>
            </div>

            <!-- Formulario para agregar al carrito -->
            @auth
            <div class="card shadow-lg border-0 mt-4">
                <div class="card-header bg-light text-center">
                    <h4 class="h5 mb-0">Agregar al carrito</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('cart-items.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        @php
                            $shoppingCart = auth()->user()->shoppingCart ?? null;
                        @endphp

                        @if($shoppingCart)
                            <input type="hidden" name="shopping_cart_id" value="{{ $shoppingCart->id }}">

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Cantidad</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" max="{{ $product->stock }}" required>
                                @error('quantity') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Agregar al carrito</button>
                        @else
                            <p>Debes tener un carrito activo para agregar productos. <a href="{{ route('shopping-carts.create') }}">Crea uno aquí</a>.</p>
                        @endif
                    </form>
                </div>
            </div>
            @else
                <p class="mt-3 text-center"> <a href="{{ route('login') }}">Inicia sesión</a> para agregar productos al carrito.</p>
            @endauth

            <!-- Sección de reseñas -->
            <div class="card shadow-lg border-0 mt-4">
                <div class="card-header bg-light text-center">
                    <h4 class="h5 mb-0">Reseñas</h4>
                </div>
                <div class="card-body">
                    <!-- Mostrar reseñas existentes -->
                    @if($product->productReviews->isEmpty())
                        <p class="text-center">No hay reseñas aún.</p>
                    @else
                        <div class="list-group mb-4">
                            @foreach($product->productReviews as $review)
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <strong>{{ $review->user->name }}</strong>
                                        <span class="text-warning">
                                            @for($i = 1; $i <= 5; $i++)
                                                {{ $i <= $review->rating ? '★' : '☆' }}
                                            @endfor
                                        </span>
                                    </div>
                                    <p class="mb-1">{{ $review->review }}</p>
                                    <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Formulario para agregar reseña -->
                    @auth
                        <h5 class="mb-3">Agregar una reseña</h5>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('product-reviews.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="mb-3">
                                <label for="rating" class="form-label">Puntuación</label>
                                <select name="rating" id="rating" class="form-select">
                                    @for($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }} estrella{{ $i > 1 ? 's' : '' }}</option>
                                    @endfor
                                </select>
                                @error('rating') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="review" class="form-label">Comentario</label>
                                <textarea name="review" id="review" class="form-control" rows="3"></textarea>
                                @error('review') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Enviar reseña</button>
                        </form>
                    @else
                        <p class="text-center"> <a href="{{ route('login') }}">Inicia sesión</a> para dejar una reseña.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
