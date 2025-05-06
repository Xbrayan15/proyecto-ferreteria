@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Método de Pago</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $paymentMethod->id }}</p>
            <p><strong>Nombre:</strong> {{ $paymentMethod->name }}</p>
            <a href="{{ route('payment_methods.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection
