@extends('auth.template')
@section('title', 'Panel admin')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3">
            <!-- Menú lateral -->
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action">Usuarios</a>
                <a href="#" class="list-group-item list-group-item-action">Productos</a>
                <a href="#" class="list-group-item list-group-item-action">Pedidos</a>
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