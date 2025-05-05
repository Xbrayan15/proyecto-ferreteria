<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with(['order', 'user', 'paymentMethod'])->latest()->paginate(10);
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $orders = Order::all();
        $users = User::all();
        $paymentMethods = PaymentMethod::all();
        return view('invoices.create', compact('orders', 'users', 'paymentMethods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'user_id' => 'required|exists:users,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,paid,cancelled',
        ]);

        Invoice::create($request->all());

        return redirect()->route('invoices.index')->with('success', 'Factura creada correctamente.');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['order', 'user', 'paymentMethod']);
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $orders = Order::all();
        $users = User::all();
        $paymentMethods = PaymentMethod::all();
        return view('invoices.edit', compact('invoice', 'orders', 'users', 'paymentMethods'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'user_id' => 'required|exists:users,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,paid,cancelled',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoices.index')->with('success', 'Factura actualizada correctamente.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Factura eliminada correctamente.');
    }
}
