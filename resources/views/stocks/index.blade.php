@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Stocks</h1>
    <a href="{{ route('stocks.create') }}" class="btn btn-primary mb-3">Crear Nuevo Stock</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $stock->id }}</td>
                    <td>{{ $stock->cantidad }}</td>
                    <td>
                        <a href="{{ route('stocks.edit', $stock) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('stocks.destroy', $stock) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
