@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Editar Historial de Estado</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('invoice-status-history.update', $invoiceStatusHistory) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Factura -->
                        <div class="mb-4">
                            <label for="invoice_id" class="form-label fw-bold">Factura</label>
                            <select name="invoice_id" id="invoice_id" class="form-select" required>
                                @foreach($invoices as $invoice)
                                    <option value="{{ $invoice->id }}" {{ $invoiceStatusHistory->invoice_id == $invoice->id ? 'selected' : '' }}>
                                        {{ $invoice->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="status" class="form-label fw-bold">Estado</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="pending" {{ $invoiceStatusHistory->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                                <option value="paid" {{ $invoiceStatusHistory->status == 'paid' ? 'selected' : '' }}>Pagada</option>
                                <option value="cancelled" {{ $invoiceStatusHistory->status == 'cancelled' ? 'selected' : '' }}>Cancelada</option>
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Actualizar</button>
                            <a href="{{ route('invoice-status-history.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
