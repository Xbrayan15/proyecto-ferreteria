@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Relaciones Producto - Impuesto</h1>
                </div>
                <div class="card-body p-4">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Create Button -->
                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('product-tax.create') }}" class="btn btn-success">Agregar Relación</a>
                    </div>

                    <!-- Table -->
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Impuesto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productTaxes as $relation)
                                <tr>
                                    <td>{{ $relation->id }}</td>
                                    <td>{{ $relation->product->name }}</td>
                                    <td>{{ $relation->tax->name }}</td>
                                    <td>
                                        <a href="{{ route('product-tax.show', $relation) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('product-tax.edit', $relation) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('product-tax.destroy', $relation) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta relación?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $productTaxes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
