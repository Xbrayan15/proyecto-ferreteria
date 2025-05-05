@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Historial de Estado</h1>

    <form action="{{ route('order-status-history.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="order_id" class="form-label">Pedido</label>
            <select name="order_id" id="order_id" class="form-control" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending">Pendiente</option>
                <option value="processing">Procesando</option>
                <option value="completed">Completado</option>
                <option value="cancelled">Cancelado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('order-status-history.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
