@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Método de Pago</h1>

    <p><strong>ID:</strong> {{ $paymentMethod->id }}</p>
    <p><strong>Nombre:</strong> {{ $paymentMethod->name }}</p>
    <p><strong>Creado en:</strong> {{ $paymentMethod->created_at }}</p>
    <p><strong>Actualizado en:</strong> {{ $paymentMethod->updated_at }}</p>

    <a href="{{ route('payment_methods.edit', $paymentMethod) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
