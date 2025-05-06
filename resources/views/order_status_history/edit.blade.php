@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Editar Historial de Estado</h1>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('order-status-history.update', $orderStatusHistory) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Pedido -->
                        <div class="mb-4">
                            <label for="order_id" class="form-label fw-bold">Pedido</label>
                            <select name="order_id" id="order_id" class="form-select" required>
                                @foreach($orders as $order)
                                    <option value="{{ $order->id }}" {{ $order->id == $orderStatusHistory->order_id ? 'selected' : '' }}>
                                        {{ $order->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="status" class="form-label fw-bold">Estado</label>
                            <select name="status" id="status" class="form-select" required>
                                @foreach(['pending', 'processing', 'completed', 'cancelled'] as $status)
                                    <option value="{{ $status }}" {{ $status == $orderStatusHistory->status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success px-4">Actualizar</button>
                            <a href="{{ route('order-status-history.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
