@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Método de Pago</h1>

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
