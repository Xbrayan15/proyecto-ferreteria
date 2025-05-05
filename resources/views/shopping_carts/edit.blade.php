@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Carrito</h1>

    <form action="{{ route('shopping-carts.update', $shoppingCart) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select name="user_id" class="form-select" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $shoppingCart->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('shopping-carts.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
