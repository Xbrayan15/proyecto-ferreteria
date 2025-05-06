@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Crear Método de Pago</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('payment_methods.store') }}" method="POST">
                        @csrf

    <form action="{{ route('payment_methods.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre del Método de Pago</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
