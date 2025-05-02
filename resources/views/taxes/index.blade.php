@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Impuestos</h1>
    <a href="{{ route('taxes.create') }}" class="btn btn-primary mb-3">Crear Impuesto</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tasa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taxes as $tax)
                <tr>
                    <td>{{ $tax->name }}</td>
                    <td>{{ $tax->rate }}%</td>
                    <td>
                        <a href="{{ route('taxes.edit', $tax) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('taxes.destroy', $tax) }}" method="POST" style="display:inline;">
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
