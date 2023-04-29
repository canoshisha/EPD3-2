@extends('welcome')
@section('title', 'UPOF1')
@section('scs')
<link rel="stylesheet" href="{{ asset('css/cesta.css') }}">
@endsection
@section('contenido')
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
            <!-- Gráficos y datos -->
            <h1>Dashboard con gráficos y datos</h1>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <!-- Gráfico de barras -->
                    <canvas id="grafico-barras"></canvas>
                </div>
                <div class="col-lg-6">
                    <!-- Gráfico de pastel -->
                    <canvas id="grafico-pastel"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
