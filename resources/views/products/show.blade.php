@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Producto</h1>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $product->nombre }}</h3>
            <p><strong>Descripción:</strong> {{ $product->descripcion }}</p>
            <p><strong>SKU:</strong> {{ $product->sku }}</p>
            <p><strong>Precio:</strong> ${{ number_format($product->precio, 2) }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
            <p><strong>Categoría:</strong> {{ $product->category?->nombre ?? 'N/A' }}</p>
            <p><strong>Subcategoría:</strong> {{ $product->subcategory?->nombre ?? 'N/A' }}</p>
            <p><strong>Marca:</strong> {{ $product->brand?->nombre ?? 'N/A' }}</p>
            <p><strong>Impuesto:</strong> {{ $product->tax?->name ?? 'N/A' }} ({{ $product->tax?->rate ?? 0 }}%)</p>
        </div>
    </div>

    {{-- Formulario para agregar el producto al carrito --}}
    @auth
    <div class="mt-4">
        <h4>Agregar al carrito</h4>
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

                <button type="submit" class="btn btn-primary">Agregar al carrito</button>
            @else
                <p>Debes tener un carrito activo para agregar productos. <a href="{{ route('shopping-carts.create') }}">Crea uno aquí</a>.</p>
            @endif
        </form>
    </div>
    @else
        <p class="mt-3"> <a href="{{ route('login') }}">Inicia sesión</a> para agregar productos al carrito.</p>
    @endauth

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>

    {{-- SECCIÓN DE RESEÑAS --}}
    <div class="mt-5">
        <h3 class="mb-3">Reseñas</h3>

        {{-- Mostrar reseñas existentes --}}
        @if($product->productReviews->isEmpty())
            <p>No hay reseñas aún.</p>
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

        {{-- Formulario para agregar reseña --}}
        @auth
            <h4>Agregar una reseña</h4>

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

                <button type="submit" class="btn btn-primary">Enviar reseña</button>
            </form>
        @else
            <p class="mt-3"> <a href="{{ route('login') }}">Inicia sesión</a> para dejar una reseña.</p>
        @endauth
    </div>

    <h4 class="mt-5">Impuestos Aplicados</h4>

    {{-- Mostrar impuestos asignados --}}
    @if($product->taxes->isEmpty())
        <p>No hay impuestos asignados a este producto.</p>
    @else
        <ul>
            @foreach($product->taxes as $tax)
                <li>{{ $tax->name }} ({{ $tax->rate }}%)</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection
