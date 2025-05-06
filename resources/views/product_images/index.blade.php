@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Imágenes del Producto: {{ $product->name }}</h1>
                </div>
                <div class="card-body p-4">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Create Button -->
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ route('product.images.create', $product->id) }}" class="btn btn-success">Subir Nueva Imagen</a>
                    </div>

                    <!-- Images Grid -->
                    <div class="row">
                        @foreach ($images as $image)
                            <div class="col-md-4 col-lg-3 mb-4">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('storage/' . $image->url) }}" class="card-img-top" alt="Imagen del producto">
                                    <div class="card-body text-center">
                                        <p class="card-text">
                                            @if($image->is_main)
                                                <span class="badge bg-success">Imagen Principal</span>
                                            @else
                                                <form action="{{ route('product.images.setMain', [$product->id, $image->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Establecer como Principal</button>
                                                </form>
                                            @endif
                                        </p>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('product.images.edit', [$product->id, $image->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('product.images.destroy', [$product->id, $image->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta imagen?')">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $images->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
