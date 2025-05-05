@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Carrito</h1>

    <form action="{{ route('shopping-carts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select name="user_id" class="form-select" required>
                <option value="">Seleccione un usuario</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('shopping-carts.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
