{{-- <div style="max-width: 700px; font-family: arial; margin: auto; border: 1px solid #DDD; border-radius: 32px 0px 32px 0px; padding: 40px; ">--}}
{{--	<img src="{{asset('assets/img/logo-color.png')}}" width="130"><br><br>--}}
{{--	<h1 style="font-size:24px;">Estimado(a)</h1>--}}
{{--	<h2 style="color:#274877; font-size:20px;">Se Ah generado la Anulación {{$beta->number_ticket}}, a continuacion le brindamos los detalles para su atención:</h2> <br>--}}
{{--	<div style="color:#444;">--}}
{{--	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Número de Anulación: </b> {{$beta->number_ticket}}</p>--}}
{{--	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Fecha de registro: </b> {{$beta->created_at}}</p>--}}
{{--	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Clinica: </b> {{$beta->clinic_id}}</p>--}}
{{--	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Sucursal: </b> {{$beta->branch_id}}</p>--}}
{{--	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Centro Médico: </b> {{$beta->center_medical_id}}</p>--}}
{{--	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Unidades: </b> {{$beta->unit_id}}</p>--}}
{{--	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Profesionales: </b> {{$beta->professional_id}}</p>--}}
{{--	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Especialidad: </b> {{$beta->espname}}</p>--}}
{{--	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Motivo Anulación: </b> {{$beta->anulation}}</p>--}}
{{--	</div>--}}
{{--	<br><br>--}}
{{--	<a href="#" style="margin-top:20px; text-decoration: none; background-color: #274877; padding: 12px; color:white; border-radius: 8px; font-weight: bold;"> Atender Anulación</a>--}}

{{--    </div>--}}

<div style="max-width: 700px; font-family: arial; margin: auto; border: 1px solid #DDD; border-radius: 32px 0px 32px 0px; padding: 40px; ">
    <img src="{{asset('assets/img/logo-color.png')}}" width="130"><br><br>
    <h1 style="font-size:24px;">Estimado(a)</h1>
    <h2 style="color:#274877; font-size:20px;">Se Ah generado la Anulación {{$beta['0']}}, a continuacion le brindamos los detalles para su atención:</h2> <br>
    <div style="color:#444;">
        <p style="margin-bottom: 6px; margin-top: 6px;"><b>Número de Anulación: </b> {{$beta['0']}} </p>
        <p style="margin-bottom: 6px; margin-top: 6px;"><b>Fecha de registro: </b>{{$beta['1']}} </p>
        <p style="margin-bottom: 6px; margin-top: 6px;"><b>Clinica: </b> {{$beta['2']}}</p>
        <p style="margin-bottom: 6px; margin-top: 6px;"><b>Sucursal: </b> {{$beta['3']}}</p>
        <p style="margin-bottom: 6px; margin-top: 6px;"><b>Centro Médico: </b> {{$beta['4']}}</p>
        <p style="margin-bottom: 6px; margin-top: 6px;"><b>Unidades: </b> {{$beta['5']}}</p>
        <p style="margin-bottom: 6px; margin-top: 6px;"><b>Profesionales: </b> {{$beta['6']}}</p>
        <p style="margin-bottom: 6px; margin-top: 6px;"><b>Especialidad: </b> {{$beta['7']}}</p>
        <p style="margin-bottom: 6px; margin-top: 6px;"><b>Motivo Anulación: </b> {{$beta['8']}}</p>
    </div>
    <br><br>
    <a href="#" style="margin-top:20px; text-decoration: none; background-color: #274877; padding: 12px; color:white; border-radius: 8px; font-weight: bold;"> Atender Anulación</a>

</div>
