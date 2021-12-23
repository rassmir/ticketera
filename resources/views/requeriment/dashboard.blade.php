@extends('layouts.app')
@section('title','Dashboard Requerimiento')
@section('app-content')
    <div class="main-content p-48 p-sm-16 bg-white mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">Dashboard Requerimientos</h2>
        </div>
        <div class="row">
        <div class="col-lg-3 p-48 border-right">
            <h2 class="text-pri"><span class="font-18">Requerimientos registrados en</span><br> TOTAL</h2>
            <h2 class="font-48">520</h2>
        </div>
        <div class="col-lg-3 p-48 border-right">
            <h2 class="text-pri"><span class="font-18">Requerimientos</span><br> CADUCADOS</h2>
            <h2 class="font-48">60</h2>
        </div>
        <div class="col-lg-3 p-48 border-right">
            <h2 class="text-pri"><span class="font-18">Requerimientos</span><br> CERRADOS</h2>
            <h2 class="font-48">100</h2>
        </div>
        <div class="col-lg-3 p-48">
            <h2 class="text-pri"><span class="font-18">Requerimientos en</span><br> PROCESO</h2>
            <h2 class="font-48">360</h2>
        </div>
        <div class="col-lg-4 p-48">
            <canvas id="grafico1" width="400" height="400"></canvas>
        </div>
        <div class="col-lg-4 p-48">
            <canvas id="grafico2" width="400" height="400"></canvas>
        </div>
        <div class="col-lg-4 p-48">
            <canvas id="grafico3" width="400" height="400"></canvas>
        </div>
        <div class="col-lg-12">
            <h2>Efectividad</h2>
        </div>
        <div class="col-lg-4 p-48">
            <canvas id="grafico4" width="400" height="400"></canvas>
        </div>
        <div class="col-lg-4 p-48">
            <canvas id="grafico5" width="400" height="400"></canvas>
        </div>
        <div class="col-lg-4 p-48">
            <canvas id="grafico6" width="400" height="400"></canvas>
        </div>
</div>

    </div>
@endsection
@push('scripts')
    <script type="text/javascript">

        // GRFICOS

    const gra1 = document.getElementById('grafico1');
const myChart = new Chart(gra1, {
    type: 'pie',
    data: {
        labels: ['Caducados', 'En proceso'],
        datasets: [{
            label: '# of Votes',
            data: [50, 30],
            backgroundColor: [

                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// FIN DE GRAFICOS

// GRFICOS

const gra2 = document.getElementById('grafico2');
const myChart2 = new Chart(gra2, {
    type: 'bar',
    data: {
        labels: ['ODONTOLOGIA', 'KINESIOTERAPIA', 'UNIDAD DE TRANSPLANTE', 'URGENCIA ACCIDENTES', 'VACUNATORIO'],
        datasets: [{
            label: 'Requerimientos Caducados',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [

                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [

                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// FIN DE GRAFICOS

// GRFICOS

const gra3 = document.getElementById('grafico3');
const myChart3 = new Chart(gra3, {
    type: 'pie',
    data: {
        labels: ['Cerrados', 'Pendientes'],
        datasets: [{
            label: 'Requerimientos',
            data: [40, 40],
            backgroundColor: [
                'rgba(75, 192, 192, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// FIN DE GRAFICOS

// GRFICOS

const gra4 = document.getElementById('grafico4');
const myChart4 = new Chart(gra4, {
    type: 'doughnut',
    data: {
        labels: ['Cerrados', 'Pendientes'],
        datasets: [{
            label: 'Requerimientos',
            data: [40, 40],
            backgroundColor: [
                'rgba(75, 192, 192, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// FIN DE GRAFICOS

// GRFICOS

const gra5 = document.getElementById('grafico5');
const myChart5 = new Chart(gra5, {
    type: 'bar',
    data: {
        labels: ['Cerrados', 'Pendientes'],
        datasets: [{
            label: 'Requerimientos',
            data: [40, 40],
            backgroundColor: [
                'rgba(75, 192, 192, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        indexAxis: 'y',
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// FIN DE GRAFICOS

// GRFICOS

const gra6 = document.getElementById('grafico6');
const myChart6 = new Chart(gra6, {
    type: 'bar',
    data: {
        labels: ['Cerrados', 'Pendientes'],
        datasets: [{
            label: 'Requerimientos',
            data: [40, 40],
            backgroundColor: [
                'rgba(75, 192, 192, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// FIN DE GRAFICOS
</script>
@endpush
