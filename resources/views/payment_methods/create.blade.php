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

                        <!-- Nombre del Método -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">Nombre del Método</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Ingrese el nombre del método" required>
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
