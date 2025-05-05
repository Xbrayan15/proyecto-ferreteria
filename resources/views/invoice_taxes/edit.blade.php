@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Invoice Tax</h1>

    <form action="{{ route('invoice-taxes.update', $invoiceTax) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="invoice_id" class="form-label">Invoice ID</label>
            <input type="number" name="invoice_id" class="form-control" value="{{ $invoiceTax->invoice_id }}" required>
        </div>

        <div class="mb-3">
            <label for="tax_id" class="form-label">Tax ID</label>
            <input type="number" name="tax_id" class="form-control" value="{{ $invoiceTax->tax_id }}" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" value="{{ $invoiceTax->amount }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('invoice-taxes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
