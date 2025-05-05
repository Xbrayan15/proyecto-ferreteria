@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Cupones</h1>
    <a href="{{ route('coupons.create') }}" class="btn btn-primary mb-3">Nuevo Cupón</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descuento</th>
                <th>Tipo</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->discount_amount }}</td>
                    <td>{{ $coupon->discount_type }}</td>
                    <td>{{ $coupon->valid_from->format('d/m/Y H:i') }}</td>
                    <td>{{ $coupon->valid_until->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('coupons.show', $coupon) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('coupons.edit', $coupon) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('coupons.destroy', $coupon) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este cupón?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
