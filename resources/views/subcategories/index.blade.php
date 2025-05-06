@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Subcategorías</h1>
                </div>
                <div class="card-body">
                    <!-- Create Button -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('subcategories.create') }}" class="btn btn-success">Crear Subcategoría</a>
                    </div>

                    <!-- Table -->
                    @if($subcategories->isEmpty())
                        <p class="text-muted">No hay subcategorías registradas.</p>
                    @else
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ $subcategory->id }}</td>
                                        <td>{{ $subcategory->nombre }}</td>
                                        <td>{{ $subcategory->category->nombre }}</td>
                                        <td>
                                            <a href="{{ route('subcategories.show', $subcategory) }}" class="btn btn-sm btn-info">Ver</a>
                                            <a href="{{ route('subcategories.edit', $subcategory) }}" class="btn btn-sm btn-warning">Editar</a>
                                            <form action="{{ route('subcategories.destroy', $subcategory) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar esta subcategoría?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $subcategories->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
