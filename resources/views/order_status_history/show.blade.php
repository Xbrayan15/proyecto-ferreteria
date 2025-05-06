@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalles del Historial de Estado</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>ID:</strong> {{ $orderStatusHistory->id }}</li>
                        <li class="list-group-item"><strong>Pedido:</strong> {{ $orderStatusHistory->order_id }}</li>
                        <li class="list-group-item"><strong>Estado:</strong> {{ ucfirst($orderStatusHistory->status) }}</li>
                        <li class="list-group-item"><strong>Creado en:</strong> {{ $orderStatusHistory->created_at->format('Y-m-d H:i') }}</li>
                    </ul>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('order-status-history.edit', $orderStatusHistory) }}" class="btn btn-warning px-4">Editar</a>
                        <a href="{{ route('order-status-history.index') }}" class="btn btn-secondary px-4">Volver al listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
