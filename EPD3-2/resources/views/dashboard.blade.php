@extends('template_admin')
@section('css')
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
        <div class="col-lg-12 col-md-6 mx-auto">
            <!-- Gráfico de barras -->
            <h3>Los más vendidos</h3>
            <hr>
            <canvas id="grafico-pastel-vendidos"></canvas>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-6">
            <!-- Gráfico de pastel -->
            <h3>Los más favoritos</h3>
            <hr>
            <canvas id="grafico-pastel-favoritos"></canvas>
        </div>
    </div>
    <br>
    <script>
        var nombresProductos = <?php echo $nombresProductos; ?>;
        var cantidadesVendidas = <?php echo $cantidadesVendidas; ?>;
        var nombresProductos_fav = <?php echo $nombresProductos_fav; ?>;
        var cantidadFavoritos = <?php echo $cantidadFavoritos; ?>;
    </script>

    <script src="js/graficas.js"></script>
@endsection
