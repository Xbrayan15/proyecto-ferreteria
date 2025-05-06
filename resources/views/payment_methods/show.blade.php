@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle del Método de Pago</h1>
                </div>
                <div class="card-body">
                    <!-- Detalles del Método de Pago -->
                    <div class="mb-3">
                        <strong>ID:</strong> {{ $paymentMethod->id }}
                    </div>
                    <div class="mb-3">
                        <strong>Nombre:</strong> {{ $paymentMethod->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Creado:</strong> {{ $paymentMethod->created_at->format('d/m/Y H:i') }}
                    </div>
                    <div class="mb-3">
                        <strong>Actualizado:</strong> {{ $paymentMethod->updated_at->format('d/m/Y H:i') }}
                    </div>

                    <!-- Botones de Acción -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('payment_methods.edit', $paymentMethod) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
