@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Invoice Taxes</h1>
    <a href="{{ route('invoice-taxes.create') }}" class="btn btn-primary mb-3">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Invoice</th>
                <th>Tax</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoiceTaxes as $invoiceTax)
                <tr>
                    <td>{{ $invoiceTax->id }}</td>
                    <td>{{ $invoiceTax->invoice_id }}</td>
                    <td>{{ $invoiceTax->tax_id }}</td>
                    <td>${{ $invoiceTax->amount }}</td>
                    <td>
                        <a href="{{ route('invoice-taxes.show', $invoiceTax) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('invoice-taxes.edit', $invoiceTax) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('invoice-taxes.destroy', $invoiceTax) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
