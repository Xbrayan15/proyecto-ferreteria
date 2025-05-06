@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Historial de Estados de Pedido</h1>
                </div>
                <div class="card-body">
                    <!-- Create Button -->
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('order-status-history.create') }}" class="btn btn-success">Crear nuevo historial</a>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Table -->
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Pedido</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $history)
                                <tr>
                                    <td>{{ $history->id }}</td>
                                    <td>{{ $history->order_id }}</td>
                                    <td>{{ ucfirst($history->status) }}</td>
                                    <td>{{ $history->created_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <a href="{{ route('order-status-history.show', $history) }}" class="btn btn-sm btn-info">Ver</a>
                                        <a href="{{ route('order-status-history.edit', $history) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('order-status-history.destroy', $history) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este historial?')">
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
                        {{ $histories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
