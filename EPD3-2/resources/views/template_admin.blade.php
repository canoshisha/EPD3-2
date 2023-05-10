@extends('auth.template')
@section('title', 'Panel admin')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <!-- Menú lateral -->
                <div class="list-group">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="{{ route('admin.user') }}" class="list-group-item list-group-item-action">Usuarios</a>
                    <a href="{{ route('admin.products') }}" class="list-group-item list-group-item-action">Productos</a>
                    <a href="{{ route('admin.order') }}" class="list-group-item list-group-item-action">Pedidos</a>
                    <a href="{{ route('admin.category') }}" class="list-group-item list-group-item-action">Categorias</a>
                    <a href="{{ route('admin.addresses') }}" class="list-group-item list-group-item-action">Direcciones</a>
                </div>
            </div>
            <div class="col-lg-9">
                @yield('scs')
                @yield('js')
                @yield('contenido')
            </div>
        </div>
    </div>
@endsection
