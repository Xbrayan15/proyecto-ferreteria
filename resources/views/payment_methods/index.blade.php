@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Métodos de Pago</h1>

    <a href="{{ route('payment_methods.create') }}" class="btn btn-primary mb-3">Crear nuevo método</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paymentMethods as $method)
                <tr>
                    <td>{{ $method->id }}</td>
                    <td>{{ $method->name }}</td>
                    <td>
                        <a href="{{ route('payment
