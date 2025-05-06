@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Editar Impuesto</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('taxes.update', $tax) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $tax->name) }}" required>
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tasa -->
                        <div class="mb-4">
                            <label for="rate" class="form-label fw-bold">Tasa (%)</label>
                            <input type="number" name="rate" id="rate" class="form-control" value="{{ old('rate', $tax->rate) }}" min="0" max="100" step="0.01" required>
                            @error('rate')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Actualizar</button>
                            <a href="{{ route('taxes.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
