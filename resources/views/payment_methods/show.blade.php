@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalles del Método de Pago</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>ID:</strong> {{ $paymentMethod->id }}</li>
                        <li class="list-group-item"><strong>Nombre:</strong> {{ $paymentMethod->name }}</li>
                        <li class="list-group-item"><strong>Creado en:</strong> {{ $paymentMethod->created_at->format('d/m/Y H:i') }}</li>
                        <li class="list-group-item"><strong>Actualizado en:</strong> {{ $paymentMethod->updated_at->format('d/m/Y H:i') }}</li>
                    </ul>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary px-4">Volver al listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
