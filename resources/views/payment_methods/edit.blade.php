@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Método de Pago</h1>

    <form action="{{ route('payment_methods.update', $paymentMethod) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Método</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $paymentMethod->name) }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
