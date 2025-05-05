@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg w-100" style="max-width: 400px; border: none;">
        <div class="card-header text-center bg-white">
            <h3 class="text-muted">Iniciar Sesión</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label text-muted">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-muted">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-muted" for="remember">Recuérdame</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-dark">Iniciar Sesión</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center bg-white">
            <a href="{{ route('password.request') }}" class="text-muted">¿Olvidaste tu contraseña?</a>
        </div>
    </div>
</div>
@endsection
