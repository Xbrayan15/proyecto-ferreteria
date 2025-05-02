@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Método de Pago</h1>

    <form action="{{ route('payment_methods.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Método</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('payment_methods.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
