@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Historial de Estado</h1>

    <form action="{{ route('order-status-history.update', $orderStatusHistory) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="order_id" class="form-label">Pedido</label>
            <select name="order_id" id="order_id" class="form-control" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}" {{ $order->id == $orderStatusHistory->order_id ? 'selected' : '' }}>
                        {{ $order->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-control" required>
                @foreach(['pending', 'processing', 'completed', 'cancelled'] as $status)
                    <option value="{{ $status }}" {{ $status == $orderStatusHistory->status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('order-status-history.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
