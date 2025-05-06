@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="h4 mb-0">Dashboard</h1>
                </div>
                <div class="card-body text-center">
                    <p class="mb-0">{{ __("You're logged in!") }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid with links -->
    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center shadow-hover">
                    <h5 class="card-title">Direcciones</h5>
                    <p class="card-text">Gestiona las direcciones de los usuarios.</p>
                    <a href="{{ route('addresses.index') }}" class="btn btn-primary">Ver Direcciones</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Categorías</h5>
                    <p class="card-text">Administra las categorías de productos.</p>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">Ver Categorías</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Subcategorías</h5>
                    <p class="card-text">Gestiona las subcategorías de productos.</p>
                    <a href="{{ route('subcategories.index') }}" class="btn btn-primary">Ver Subcategorías</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Marcas</h5>
                    <p class="card-text">Administra las marcas de productos.</p>
                    <a href="{{ route('brands.index') }}" class="btn btn-primary">Ver Marcas</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Impuestos</h5>
                    <p class="card-text">Gestiona los impuestos aplicables.</p>
                    <a href="{{ route('taxes.index') }}" class="btn btn-primary">Ver Impuestos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text">Administra los productos disponibles.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Ver Productos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Movimientos de Stock</h5>
                    <p class="card-text">Gestiona los movimientos de inventario.</p>
                    <a href="{{ route('stock-movements.index') }}" class="btn btn-primary">Ver Movimientos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Carritos de Compra</h5>
                    <p class="card-text">Administra los carritos de compra de los usuarios.</p>
                    <a href="{{ route('shopping-carts.index') }}" class="btn btn-primary">Ver Carritos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Órdenes</h5>
                    <p class="card-text">Gestiona las órdenes realizadas.</p>
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">Ver Órdenes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
