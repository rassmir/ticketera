<div style="max-width: 700px; font-family: arial; margin: auto; border: 1px solid #DDD; border-radius: 32px 0px 32px 0px; padding: 40px; ">
    <img src="{{asset('assets/img/logo-color.png')}}" width="130"><br>
    <h1 style="font-size:24px;">Estimado(a)</h1>
    <h2 style="color:#274877; font-size:20px;">Se Registrado un nuevo requerimiento, a continuacion los detalles:</h2> <br>
    <p style="margin-bottom: 6px; margin-top: 6px;"><b>Número de Requerimiento: </b> {{$requeriments->number_solicity}}</p>
    <p style="margin-bottom: 6px; margin-top: 6px;"><b>Tipo de requerimiento: </b> {{$requeriments->type}}</p>
    <p style="margin-bottom: 6px; margin-top: 6px;"><b>Fecha de registro: </b> {{$requeriments->datetime_local}}</p>
    <br><br>
    <a href="#" style="margin-top:20px; text-decoration: none; background-color: #274877; padding: 12px; color:white; border-radius: 8px; font-weight: bold;"> Atender Requerimiento</a>
</div>
