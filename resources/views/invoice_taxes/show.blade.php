@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Invoice Tax Details</h1>

    <p><strong>ID:</strong> {{ $invoiceTax->id }}</p>
    <p><strong>Invoice ID:</strong> {{ $invoiceTax->invoice_id }}</p>
    <p><strong>Tax ID:</strong> {{ $invoiceTax->tax_id }}</p>
    <p><strong>Amount:</strong> ${{ $invoiceTax->amount }}</p>

    <a href="{{ route('invoice-taxes.edit', $invoiceTax) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('invoice-taxes.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
