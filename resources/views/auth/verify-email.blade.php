@extends('layouts.app')

@section('title', 'Verificar Correo Electrónico | Tool City')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg w-100" style="max-width: 500px; border: none;">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Verificar Correo Electrónico</h3>
        </div>
        <div class="card-body">
            <p class="text-muted mb-4">
                Gracias por registrarte. Antes de comenzar, verifica tu dirección de correo electrónico haciendo clic en el enlace que te enviamos. Si no recibiste el correo, con gusto te enviaremos otro.
            </p>

            <!-- Session Status -->
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success mb-4">
                    Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste durante el registro.
                </div>
            @endif

            <div class="d-flex justify-content-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Reenviar Correo de Verificación</button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
