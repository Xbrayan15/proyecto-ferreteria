@extends('layouts.app')

@section('content')
    <h1>Editar Historial</h1>

    <form action="{{ route('invoice-status-history.update', $invoiceStatusHistory) }}" method="POST">
        @csrf @method('PUT')

        <label>Factura:</label>
        <select name="invoice_id">
            @foreach($invoices as $invoice)
                <option value="{{ $invoice->id }}" {{ $invoiceStatusHistory->invoice_id == $invoice->id ? 'selected' : '' }}>
                    {{ $invoice->id }}
                </option>
            @endforeach
        </select>

        <label>Estado:</label>
        <select name="status">
            <option value="pending" {{ $invoiceStatusHistory->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
            <option value="paid" {{ $invoiceStatusHistory->status == 'paid' ? 'selected' : '' }}>Pagada</option>
            <option value="cancelled" {{ $invoiceStatusHistory->status == 'cancelled' ? 'selected' : '' }}>Cancelada</option>
        </select>

        <button type="submit">Actualizar</button>
    </form>
@endsection
