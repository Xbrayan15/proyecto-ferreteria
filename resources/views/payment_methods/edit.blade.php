@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Método de Pago</h1>

    <form action="{{ route('payment_methods.update', $paymentMethod) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $paymentMethod->name) }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
