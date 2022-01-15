@extends('layouts.app')
@section('title','Dashboard Requerimiento')
@section('app-content')
<style>
    .bo{
            border: 8px solid #dee2e9;
    }
</style>
    <div class="main-content p-48 pt-0 p-sm-16 mt-sm-16">
        <div class="text-left">
            <h2 class="text-pri">Dashboard Requerimientos</h2>
        </div>
        <div class="row mostrador-graficos">
        <div class="col-lg-3 p-48 border-right bg-white bo">
            <h2 class="text-pri font-20"><span class="font-18">Requerimientos registrados en</span><br><a href="https://banmedica.codishark.com/buscar-requerimientos"> TOTAL</a></h2>
            <h2 class="font-56">{{$total}}</h2>
        </div>
        <div class="col-lg-3 p-48 border-right bg-white bo">
            <h2 class="text-pri font-20"><span class="font-16">Requerimientos</span><br><a href="https://banmedica.codishark.com/buscar-requerimientos?or=dash&acc=in"><i class="fas fa-circle text-danger font-24"></i> INGRESADOS</a></h2>
            <h2 class="font-56">{{$caducado}}</h2>
        </div>
        <div class="col-lg-3 p-48 border-right bg-white bo">
            <h2 class="text-pri font-20"><span class="font-16">Requerimientos</span><br><a href="https://banmedica.codishark.com/buscar-requerimientos?or=dash&acc=ce"><i class="fas fa-circle text-success font-24"></i> CERRADOS</a></h2>
            <h2 class="font-56">{{$exitoso}}</h2>
        </div>
        <div class="col-lg-3 p-48 bg-white bo">
            <h2 class="text-pri font-20"><span class="font-16">Requerimientos en</span><br><a href="https://banmedica.codishark.com/buscar-requerimientos?or=dash&acc=pr"><i class="fas fa-circle text-warning font-24"></i> PROCESO</a></h2>
            <h2 class="font-56">{{$proceso}}</h2>
        </div>
        <div class="col-lg-6 p-56 border-right bg-white bo">
        <h2>Caducados en General</h2>
        <div style="max-width:350px;">
            <canvas id="grafico1" class="mt-28" width="400" height="400"></canvas>
        </div>
            
        </div>
        <div class="col-lg-6 p-56 border-right bg-white bo">
        <h2>Caducados por Clínica</h2>
        <div style="max-height:350px;">
            <canvas id="grafico2" class="mt-28" width="600" height="300"></canvas>
            </div>
        </div>
        <div class="col-lg-3 p-56 bg-white bo">
        <h2>Efectividad en General</h2>
        <p>La efectividad se calcula en base a los requerimientos cerrados dentro de su tiempo estimado (SLA) frente a los requerimientos caducados y en proceso.</p>
        <div id="efe-gen">
            
        </div>
            <!--<canvas id="grafico3" class="mt-28" width="400" height="400"></canvas>-->
        </div>
        

    


</div>

    </div>
@endsection
@push('scripts')
    <script type="text/javascript">

//Chart.register(ChartDataLabels);


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
            //console.log(response);
            // GRAFICO 1
            const gra1 = document.getElementById('grafico1');
            var ctxP = gra1.getContext('2d');
            //var gra1 = $("#grafico1").get(0).getContext("2d");
            const myChart = new Chart(ctxP, {
                type: 'pie',
                data: {
                    labels: ['Caducados', 'En proceso'],
                    datasets: [{
                        label: ['Caducados', 'En proceso'],
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
 
            });
            // FIN DE GRAFICOS
            
            //ENLACES DE GRAFICO 1
            
               gra1.onclick = function(e) {
               var slice = myChart.getElementsAtEvent(e);
               console.log(slice);
               if (!slice.length) return; // return if not clicked on slice
               var label = slice[0]._model.label;
               switch (label) {
                  // add case for each label/slice
                  case 'Caducados':
                      window.location.href ="https://banmedica.codishark.com/buscar-requerimientos?or=dash&acc=cad";

                     break;
                  case 'En proceso':
                     window.location.href ="https://banmedica.codishark.com/buscar-requerimientos?or=dash&acc=pro";
                     break;
                  // add rests ...
               }
            }

    
            // FIN DE ENLACES
        },
        error: function (error) {
            console.log(error);
        }
    });
    

        
        

    $.ajax({
        type: "GET",
        url: uri + 'grafico2',
        success: function (response) {
            //console.log(response);
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
            
            //ENLACES DE GRAFICO 1
            
               gra2.onclick = function(e) {
               var slice = myChart2.getElementsAtEvent(e);
               console.log(slice);
               if (!slice.length) return; // return if not clicked on slice
               var label = slice[0]._model.label;
               switch (label) {
                    // add case for each label/slice
                    case 'CLINICA SANTA MARIA S.A':
                      window.location.href ="https://banmedica.codishark.com/buscar-requerimientos?or=dash&acc=clism";
                    break;
                    
                     case 'CLINICA VESPUCIO S.A.':
                      window.location.href ="https://banmedica.codishark.com/buscar-requerimientos?or=dash&acc=clivs";
                    break;
               }
            }
            // FIN DE ENLACES
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "GET",
        url: uri + 'grafico3',
        success: function (response1) {
            
            var flecha = "";
            var efectividad = parseFloat(response1[0]); 
                
                if(efectividad >= 50){
                    flecha = '<i class="fas fa-arrow-up text-pri"></i>';
                }else{
                    flecha = '<i class="fas fa-arrow-down text-danger"></i>';
                }
                
            $('#efe-gen').html('<p class="font-48 font-weight-bold">'+ flecha + " " + response1[0]+'%</p>');
            console.log(response1);
            // GRAFICO 3
            const gra3 = document.getElementById('grafico3');
            const myChart3 = new Chart(gra3, {
                type: 'doughnut',
                data: {
                    labels: ['Cerrados dentro del SLA', 'Caducados y en Proceso'],
                    datasets: [{
                        labels: ['Cerrados dentro del SLA', 'Caducados y en Proceso'],
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
                }
            });
            // FIN DE GRAFICOS
            
            //ENLACES DE GRAFICO 1
               gra3.onclick = function(e) {
               var slice = myChart3.getElementsAtEvent(e);
               console.log(slice);
               if (!slice.length) return; // return if not clicked on slice
               var label = slice[0]._model.label;
               switch (label) {
                    // add case for each label/slice
                    case 'Cerrados dentro del SLA':
                      window.location.href ="https://banmedica.codishark.com/buscar-requerimientos?or=dash&acc=ef";
                    break;
               }
            }
            // FIN DE ENLACES
        },
        error: function (error) {
            console.log(error);
        }
    });
    
    // GRAFICO 4
    
    $.ajax({
        type: "GET",
        url: uri + 'grafico4',
        success: function (response1) {
            console.log(response1);
            var contador = 0;
            
            var flecha = "";
            
            $.each(response1,(index, value) =>{
                
                var id_grafico = 'clinica' + contador;
                var efectividad = parseFloat(value['data'][0]); 
                
                if(efectividad >= 50){
                    flecha = '<i class="fas fa-arrow-up text-pri"></i>';
                }else{
                    flecha = '<i class="fas fa-arrow-down text-danger"></i>';
                }
                
                
                
                
                $('.mostrador-graficos').append('<div class="col-lg-3 p-56 bg-white bo"><p class="font-48 font-weight-bold">'+ flecha + " " + value['data'][0]+'%</p><h3>'+ index +'</h3></div>');
                //$('.mostrador-graficos').append('<div class="col-lg-4 p-56"><h3>'+ index +'</h3><canvas id="' + id_grafico + '" class="mt-28" width="400" height="400"></canvas></div>');
                
                // GRAFICO 3
            /*const gra3 = document.getElementById(id_grafico);
            const myChart3 = new Chart(gra3, {
                type: 'doughnut',
                data: {
                    labels: ['Cerrados dentro del SLA', 'Caducados y en Proceso'],
                    datasets: [{
                        label: 'Requerimientos',
                        data: value['data'],
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
                    
                }
            }); */
            // FIN DE GRAFICOS
                
                
                
                contador++;
            });
            
            
            // GRAFICO 3
            /*const gra3 = document.getElementById('grafico4');
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
            }); */
            // FIN DE GRAFICOS
        },
        error: function (error) {
            console.log(error);
        }
    });
</script>
@endpush
