@extends('layouts.app')

@section('title', 'Recuperar Contraseña | Tool City')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg w-100" style="max-width: 400px; border: none;">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Recuperar Contraseña</h3>
        </div>
        <div class="card-body">
            <p class="text-muted mb-4">
                ¿Olvidaste tu contraseña? No hay problema. Ingresa tu dirección de correo electrónico y te enviaremos un enlace para restablecerla.
            </p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Enviar Enlace de Restablecimiento</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
