@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Crear Cupón</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('coupons.store') }}" method="POST">
                        @csrf

                        <!-- Código -->
                        <div class="mb-4">
                            <label for="code" class="form-label fw-bold">Código</label>
                            <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
                            @error('code') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <!-- Monto de Descuento -->
                        <div class="mb-4">
                            <label for="discount_amount" class="form-label fw-bold">Monto de Descuento</label>
                            <input type="number" step="0.01" name="discount_amount" class="form-control" value="{{ old('discount_amount') }}" required>
                            @error('discount_amount') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <!-- Tipo de Descuento -->
                        <div class="mb-4">
                            <label for="discount_type" class="form-label fw-bold">Tipo de Descuento</label>
                            <select name="discount_type" class="form-select" required>
                                <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Porcentaje</option>
                                <option value="fixed" {{ old('discount_type') == 'fixed' ? 'selected' : '' }}>Monto Fijo</option>
                            </select>
                            @error('discount_type') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <!-- Válido Desde -->
                        <div class="mb-4">
                            <label for="valid_from" class="form-label fw-bold">Válido Desde</label>
                            <input type="datetime-local" name="valid_from" class="form-control" value="{{ old('valid_from') }}" required>
                            @error('valid_from') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <!-- Válido Hasta -->
                        <div class="mb-4">
                            <label for="valid_until" class="form-label fw-bold">Válido Hasta</label>
                            <input type="datetime-local" name="valid_until" class="form-control" value="{{ old('valid_until') }}" required>
                            @error('valid_until') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('coupons.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
