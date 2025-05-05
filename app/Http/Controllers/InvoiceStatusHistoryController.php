<?php

namespace App\Http\Controllers;

use App\Models\InvoiceStatusHistory;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceStatusHistoryController extends Controller
{
    public function index()
    {
        $history = InvoiceStatusHistory::with('invoice')->get();
        return view('invoice_status_history.index', compact('history'));
    }

    public function create()
    {
        $invoices = Invoice::all();
        return view('invoice_status_history.create', compact('invoices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'status' => 'required|in:pending,paid,cancelled',
        ]);

        InvoiceStatusHistory::create($request->all());

        return redirect()->route('invoice-status-history.index')->with('success', 'Status history created successfully.');
    }

    public function show(InvoiceStatusHistory $invoiceStatusHistory)
    {
        return view('invoice_status_history.show', compact('invoiceStatusHistory'));
    }

    public function edit(InvoiceStatusHistory $invoiceStatusHistory)
    {
        $invoices = Invoice::all();
        return view('invoice_status_history.edit', compact('invoiceStatusHistory', 'invoices'));
    }

    public function update(Request $request, InvoiceStatusHistory $invoiceStatusHistory)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'status' => 'required|in:pending,paid,cancelled',
        ]);

        $invoiceStatusHistory->update($request->all());

        return redirect()->route('invoice-status-history.index')->with('success', 'Status history updated successfully.');
    }

    public function destroy(InvoiceStatusHistory $invoiceStatusHistory)
    {
        $invoiceStatusHistory->delete();

        return redirect()->route('invoice-status-history.index')->with('success', 'Status history deleted successfully.');
    }
}
