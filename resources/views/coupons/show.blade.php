@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Cupón</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Código:</strong> {{ $coupon->code }}</p>
            <p><strong>Descuento:</strong> {{ $coupon->discount_amount }}</p>
            <p><strong>Tipo:</strong> {{ $coupon->discount_type }}</p>
            <p><strong>Válido Desde:</strong> {{ $coupon->valid_from->format('d/m/Y H:i') }}</p>
            <p><strong>Válido Hasta:</strong> {{ $coupon->valid_until->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('coupons.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
