@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Ítem de Factura</h1>
    <form action="{{ route('invoice-items.update', $invoiceItem) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Factura</label>
            <select name="invoice_id" class="form-control">
                @foreach ($invoices as $invoice)
                    <option value="{{ $invoice->id }}" @selected($invoiceItem->invoice_id == $invoice->id)>
                        {{ $invoice->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Producto</label>
            <select name="product_id" class="form-control">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected($invoiceItem->product_id == $product->id)>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Cantidad</label>
            <input type="number" name="quantity" class="form-control" value="{{ $invoiceItem->quantity }}" required>
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $invoiceItem->price }}" required>
        </div>

        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
