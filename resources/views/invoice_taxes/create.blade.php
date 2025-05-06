@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Crear Impuesto de Factura</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('invoice-taxes.store') }}" method="POST">
                        @csrf

                        <!-- Factura -->
                        <div class="mb-4">
                            <label for="invoice_id" class="form-label fw-bold">Factura</label>
                            <select name="invoice_id" id="invoice_id" class="form-select" required>
                                @foreach($invoices as $invoice)
                                    <option value="{{ $invoice->id }}">{{ $invoice->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Impuesto -->
                        <div class="mb-4">
                            <label for="tax_id" class="form-label fw-bold">Impuesto</label>
                            <select name="tax_id" id="tax_id" class="form-select" required>
                                @foreach($taxes as $tax)
                                    <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Monto -->
                        <div class="mb-4">
                            <label for="amount" class="form-label fw-bold">Monto</label>
                            <input type="number" step="0.01" name="amount" id="amount" class="form-control" required>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{ route('invoice-taxes.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
