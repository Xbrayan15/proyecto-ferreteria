<?php

namespace App\Http\Controllers;

use App\Models\OrderStatusHistory;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderStatusHistoryController extends Controller
{
    public function index()
    {
        $histories = OrderStatusHistory::with('order')->get();
        return view('order_status_history.index', compact('histories'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('order_status_history.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        OrderStatusHistory::create($request->all());

        return redirect()->route('order-status-history.index')->with('success', 'Historial de estado creado correctamente.');
    }

    public function show(OrderStatusHistory $orderStatusHistory)
    {
        return view('order_status_history.show', compact('orderStatusHistory'));
    }

    public function edit(OrderStatusHistory $orderStatusHistory)
    {
        $orders = Order::all();
        return view('order_status_history.edit', compact('orderStatusHistory', 'orders'));
    }

    public function update(Request $request, OrderStatusHistory $orderStatusHistory)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $orderStatusHistory->update($request->all());

        return redirect()->route('order-status-history.index')->with('success', 'Historial de estado actualizado correctamente.');
    }

    public function destroy(OrderStatusHistory $orderStatusHistory)
    {
        $orderStatusHistory->delete();
        return redirect()->route('order-status-history.index')->with('success', 'Historial eliminado correctamente.');
    }
}
