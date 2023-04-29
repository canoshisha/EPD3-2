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
    <div class="col-lg-12">
        <!-- Gráfico de barras -->
        <canvas id="grafico-barras"></canvas>
    </div>
    <div class="col-lg-12">
        <!-- Gráfico de pastel -->
        <canvas id="grafico-pastel"></canvas>
    </div>
</div>
<script>
var ctx = document.getElementById('grafico-barras').getContext('2d');
var graficoBarras = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo $nombresProductos; ?>,
        datasets: [{
            label: 'Productos más vendidos',
            data: <?php echo $cantidadesVendidas; ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
var ctx2 = document.getElementById('grafico-pastel').getContext('2d');
var graficoPastel = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($nombresProductos_fav); ?>,
        datasets: [{
            label: 'Cantidad de favoritos',
            data: <?php echo json_encode($cantidadFavoritos); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>
@endsection