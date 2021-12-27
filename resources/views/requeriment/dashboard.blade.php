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
            <h2 class="font-48">{{$total}}</h2>
        </div>
        <div class="col-lg-3 p-48 border-right">
            <h2 class="text-pri"><span class="font-18">Requerimientos</span><br> CADUCADOS</h2>
            <h2 class="font-48">{{$caducado}}</h2>
        </div>
        <div class="col-lg-3 p-48 border-right">
            <h2 class="text-pri"><span class="font-18">Requerimientos</span><br> CERRADOS</h2>
            <h2 class="font-48">{{$exitoso}}</h2>
        </div>
        <div class="col-lg-3 p-48">
            <h2 class="text-pri"><span class="font-18">Requerimientos en</span><br> PROCESO</h2>
            <h2 class="font-48">{{$proceso}}</h2>
        </div>
        <div class="col-lg-4 p-56 border-right">
        <h2>Caducados en General</h2>
            <canvas id="grafico1" class="mt-28" width="400" height="400"></canvas>
        </div>
        <div class="col-lg-4 p-56 border-right">
        <h2>Caducados por Clínica</h2>
            <canvas id="grafico2" class="mt-28" width="400" height="400"></canvas>
        </div>
        <div class="col-lg-4 p-56">
        <h2>Efectividad en General (%)</h2>
            <canvas id="grafico3" class="mt-28" width="400" height="400"></canvas>
        </div>


</div>

    </div>
@endsection
@push('scripts')
    <script type="text/javascript">

Chart.register(ChartDataLabels);


    $.ajax({
        type: "GET",
        url: uri + 'grafico1',
        success: function (response) {

        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "GET",
        url: uri + 'grafico1',
        success: function (response) {
            console.log(response);
            // GRAFICO 1
            const gra1 = document.getElementById('grafico1');
            const myChart = new Chart(gra1, {
                type: 'pie',
                data: {
                    labels: ['Caducados', 'En proceso'],
                    datasets: [{
                        label: '# of Votes',
                        data: response,
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
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "GET",
        url: uri + 'grafico2',
        success: function (response) {
            console.log(response);
            // GRADFICO 2
            const gra2 = document.getElementById('grafico2');
            const myChart2 = new Chart(gra2, {
                type: 'bar',
                data: {
                    labels: response[0],
                    datasets: [{
                        label: 'Requerimientos Caducados',
                        data: response[1],
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
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "GET",
        url: uri + 'grafico3',
        success: function (response1) {
            console.log(response1);
            // GRAFICO 3
            const gra3 = document.getElementById('grafico3');
            const myChart3 = new Chart(gra3, {
                type: 'doughnut',
                data: {
                    labels: ['Cerrados dentro del SLA', 'Caducados y en Proceso'],
                    datasets: [{
                        label: 'Requerimientos',
                        data: response1,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(212, 212, 212, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(212, 212, 212, 0.5)',
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
        },
        error: function (error) {
            console.log(error);
        }
    });
</script>
@endpush
