@extends('layouts.app')

@section('content')
    <h1>Crear Historial de Estado</h1>

    <form action="{{ route('invoice-status-history.store') }}" method="POST">
        @csrf

        <label>Factura:</label>
        <select name="invoice_id">
            @foreach($invoices as $invoice)
                <option value="{{ $invoice->id }}">{{ $invoice->id }}</option>
            @endforeach
        </select>

        <label>Estado:</label>
        <select name="status">
            <option value="pending">Pendiente</option>
            <option value="paid">Pagada</option>
            <option value="cancelled">Cancelada</option>
        </select>

        <button type="submit">Guardar</button>
    </form>
@endsection
