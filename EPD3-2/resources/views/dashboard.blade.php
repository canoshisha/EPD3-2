@extends('template_admin')
@section('scs')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
@endsection
@section('contenido')
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
@endsection