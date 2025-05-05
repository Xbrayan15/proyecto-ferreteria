<?php

namespace App\Http\Controllers;

use App\Models\InvoiceTax;
use App\Models\Invoice;
use App\Models\Tax;
use Illuminate\Http\Request;

class InvoiceTaxController extends Controller
{
    public function index()
    {
        $invoiceTaxes = InvoiceTax::with(['invoice', 'tax'])->get();
        return view('invoice_taxes.index', compact('invoiceTaxes'));
    }

    public function create()
    {
        $invoices = Invoice::all();
        $taxes = Tax::all();
        return view('invoice_taxes.create', compact('invoices', 'taxes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'tax_id' => 'required|exists:taxes,id',
            'amount' => 'required|numeric|min:0',
        ]);

        InvoiceTax::create($request->all());

        return redirect()->route('invoice-taxes.index')->with('success', 'Impuesto aplicado correctamente.');
    }

    public function show(InvoiceTax $invoiceTax)
    {
        return view('invoice_taxes.show', compact('invoiceTax'));
    }

    public function edit(InvoiceTax $invoiceTax)
    {
        $invoices = Invoice::all();
        $taxes = Tax::all();
        return view('invoice_taxes.edit', compact('invoiceTax', 'invoices', 'taxes'));
    }

    public function update(Request $request, InvoiceTax $invoiceTax)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'tax_id' => 'required|exists:taxes,id',
            'amount' => 'required|numeric|min:0',
        ]);

        $invoiceTax->update($request->all());

        return redirect()->route('invoice-taxes.index')->with('success', 'Impuesto actualizado correctamente.');
    }

    public function destroy(InvoiceTax $invoiceTax)
    {
        $invoiceTax->delete();

        return redirect()->route('invoice-taxes.index')->with('success', 'Impuesto eliminado correctamente.');
    }
}
