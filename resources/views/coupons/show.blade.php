@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalle del Cupón</h1>
                </div>
                <div class="card-body">
                    <p><strong>Código:</strong> {{ $coupon->code }}</p>
                    <p><strong>Descuento:</strong> {{ $coupon->discount_amount }}</p>
                    <p><strong>Tipo:</strong> {{ $coupon->discount_type }}</p>
                    <p><strong>Válido Desde:</strong> {{ $coupon->valid_from->format('d/m/Y H:i') }}</p>
                    <p><strong>Válido Hasta:</strong> {{ $coupon->valid_until->format('d/m/Y H:i') }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('coupons.index') }}" class="btn btn-secondary px-4">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
