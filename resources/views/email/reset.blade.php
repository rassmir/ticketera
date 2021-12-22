<div style="max-width: 700px; font-family: arial; margin: auto; border: 1px solid #DDD; border-radius: 32px 0px 32px 0px; padding: 40px; ">
    <img src="{{URL::to('/img/logo-email.png')}}" width="130"><br>
    <h1 style="font-size:24px;">Estimado(a)</h1>
    <h2 style="color:#274877; font-size:20px;">Se Registrado un nuevo cambio de contraseña, click en el boton para resetear contraseña.</h2> <br>
    <a href="{{$url}}/token-password/{{$token}}" style="margin-top:20px; text-decoration: none; background-color: #274877; padding: 12px; color:white; border-radius: 8px; font-weight: bold;"> Resetear Contraseña</a>
</div>

