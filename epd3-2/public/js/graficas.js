var ctx = document.getElementById('grafico-barras').getContext('2d');
var graficoBarras = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: nombresProductos,
        datasets: [{
            label: 'Productos más vendidos',
            data: cantidadesVendidas,
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
// Crear el gráfico de pastel de productos favoritos
var ctx = document.getElementById('grafico-pastel-favoritos').getContext('2d');
var graficoPastelFavoritos = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: nombresProductos_fav,
        datasets: [{
            label: 'Productos favoritos',
            data: cantidadFavoritos,
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
    options: {}
});
