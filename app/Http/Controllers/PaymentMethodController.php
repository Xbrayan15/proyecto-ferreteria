<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $methods = PaymentMethod::all();
        return view('payment_methods.index', compact('methods'));
    }

    public function create()
    {
        return view('payment_methods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:payment_methods,name',
        ]);

        PaymentMethod::create($request->all());

        return redirect()->route('payment_methods.index')
            ->with('success', 'Método de pago creado correctamente.');
    }

    public function show(PaymentMethod $paymentMethod)
{
    return view('payment_methods.show', compact('paymentMethod'));
}


    public function edit(PaymentMethod $paymentMethod)
    {
        return view('payment_methods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:payment_methods,name,' . $paymentMethod->id,
        ]);

        $paymentMethod->update($request->all());

        return redirect()->route('payment_methods.index')
            ->with('success', 'Método de pago actualizado correctamente.');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();

        return redirect()->route('payment_methods.index')
            ->with('success', 'Método de pago eliminado correctamente.');
    }
}
