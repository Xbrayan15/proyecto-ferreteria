@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Editar Método de Pago</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('payment_methods.update', $paymentMethod) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nombre del Método de Pago -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">Nombre del Método de Pago</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $paymentMethod->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botones de Acción -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
