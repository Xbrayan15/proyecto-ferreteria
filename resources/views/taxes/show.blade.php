@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Detalles del Impuesto</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>Nombre:</strong> {{ $tax->name }}</li>
                        <li class="list-group-item"><strong>Tasa (%):</strong> {{ $tax->rate }}%</li>
                    </ul>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('taxes.index') }}" class="btn btn-secondary px-4">Volver al listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
