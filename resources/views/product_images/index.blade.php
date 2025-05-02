@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Imágenes del Producto: {{ $product->name }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('product.images.create', $product->id) }}" class="btn btn-primary">Subir Nueva Imagen</a>
    </div>

    <div class="row">
        @foreach ($images as $image)
            <div class="col-md-3">
                <div class="card mb-3">
                    <img src="{{ asset('storage/' . $image->url) }}" class="card-img-top" alt="Imagen del producto">
                    <div class="card-body">
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
                        <div>
                            <a href="{{ route('product.images.edit', [$product->id, $image->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('product.images.destroy', [$product->id, $image->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
