@extends('layouts.app')

@section('title', 'Inicio | Tool City')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Bienvenido a Tool City</h1>
                </div>
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h5>La mejor tienda de herramientas en línea</h5>
                    </div>

                    <!-- Navigation Links -->
                    <div class="d-flex justify-content-center gap-3 mb-4">
                        <button class="btn btn-outline-primary" @click="setSection('conocenos')">Conócenos</button>
                        <button class="btn btn-outline-primary" @click="setSection('login')">Iniciar Sesión</button>
                        <button class="btn btn-outline-primary" @click="setSection('register')">Registrar</button>
                    </div>

                    <!-- Sections -->
                    <template x-if="section === 'conocenos'">
                        <div class="section conocenos text-center">
                            <h2>Conócenos</h2>
                            <p>Bienvenido a Tool City, la mejor tienda de herramientas en línea.</p>
                        </div>
                    </template>

                    <template x-if="section === 'login'">
                        <div class="section login">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-bold">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    @error('password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Remember Me -->
                                <div class="form-check mb-4">
                                    <input type="checkbox" id="remember_me" name="remember" class="form-check-input">
                                    <label for="remember_me" class="form-check-label">Recuérdame</label>
                                </div>

                                <div class="d-flex justify-content-between">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="btn btn-link">¿Olvidaste tu contraseña?</a>
                                    @endif
                                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                </div>
                            </form>
                        </div>
                    </template>

                    <template x-if="section === 'register'">
                        <div class="section register">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-bold">Nombre</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email Address -->
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-bold">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    @error('password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label fw-bold">Confirmar Contraseña</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                    @error('password_confirmation')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('login') }}" class="btn btn-link">¿Ya estás registrado?</a>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
