<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    public function index()
    {
        $invoiceItems = InvoiceItem::with(['invoice', 'product'])->paginate(10);
        return view('invoice_items.index', compact('invoiceItems'));
    }

    public function create()
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoice_items.create', compact('invoices', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        InvoiceItem::create($request->all());

        return redirect()->route('invoice-items.index')->with('success', 'Ítem de factura creado correctamente.');
    }

    public function show(InvoiceItem $invoiceItem)
    {
        return view('invoice_items.show', compact('invoiceItem'));
    }

    public function edit(InvoiceItem $invoiceItem)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoice_items.edit', compact('invoiceItem', 'invoices', 'products'));
    }

    public function update(Request $request, InvoiceItem $invoiceItem)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $invoiceItem->update($request->all());

        return redirect()->route('invoice-items.index')->with('success', 'Ítem de factura actualizado.');
    }

    public function destroy(InvoiceItem $invoiceItem)
    {
        $invoiceItem->delete();

        return redirect()->route('invoice-items.index')->with('success', 'Ítem de factura eliminado.');
    }
}
