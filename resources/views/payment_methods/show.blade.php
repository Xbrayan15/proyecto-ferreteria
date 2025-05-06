@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalles del Método de Pago</h1>
                </div>
                <div class="card-body p-4">
                    <p><strong>ID:</strong> {{ $paymentMethod->id }}</p>
                    <p><strong>Nombre:</strong> {{ $paymentMethod->name }}</p>
                    <p><strong>Creado en:</strong> {{ $paymentMethod->created_at }}</p>
                    <p><strong>Actualizado en:</strong> {{ $paymentMethod->updated_at }}</p>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $paymentMethod->id }}</p>
            <p><strong>Nombre:</strong> {{ $paymentMethod->name }}</p>
            <a href="{{ route('payment_methods.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection
