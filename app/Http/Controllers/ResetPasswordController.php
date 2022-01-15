<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('password');

    }

    public function validateToResetPassword(Request $request)
    {
        $user = DB::table('users')->where('email', '=', $request->email)
            ->first();
        if ($user === null || '') {
            return Redirect::back()->with(array(
                'error' => 'Este correo no existe!!'
            ));
        }
        $token = Str::random(60);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: banmedica.test@codishark.com'."\r\n".'X-Mailer: PHP/' . phpversion();
                
        $mensaje = '<body style="font-family: arial;">
		        <br><br>
            	<div style="max-width: 700px; font-family: arial; margin: auto; border: 1px solid #DDD; border-radius: 32px 0px 32px 0px; padding: 40px; ">
            	<img src="https://banmedica.codishark.com/assets/img/logo-color.png" width="130"><br>
            	<h1 style="font-size:24px;">Estimado usuario</h1>
            	<h2 style="color:#274877; font-size:20px;">Recibimos una solicitud para recuperar su contraseña</h2>
                <p>Haga click en el siguiente enlace para recuperar su contraseña:</p>
            	<br>
            	<a href="https://banmedica.codishark.com/token-password/'.$token.'" target="_blank" style="margin-top:20px; text-decoration: none; background-color: #274877; padding: 12px; color:white; border-radius: 8px; font-weight: bold;"> Recuperar contraseña</a><br><br>
            	<p>Si usted no ah solicitado recuperar su contraseña, le pedimos que omita este correo.</p>
                </div>
                </body>';
                
        //@mail("vquintero@clinicasantamaria.cl, daniel.delafuente@clinicasantamaria.cl, mduran@clinicasantamaria.cl, csagardia@grupokonecta.com, carol.morales@grupokonecta.com", "Nuevo requerimiento - Banmedica", $mensaje, $headers);
        $enviar_correo = @mail($request->email, "Recuperar contraseña", $mensaje, $headers);
        
        if($enviar_correo){
            return Redirect::back()->with(array(
                'success' => 'Se envio un correo de recuperación'
            ));
        }else{
            return Redirect::back()->with(array(
                'success' => 'No se pudo enviar un correo de recuperación'
            ));
        }
        
        
        
        /*Mail::send('email.reset', ['token' => $token, 'url' => env('APP_URL')], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Resetear Contraseña');
        });*/

        
    }

    public function formEmailPasswordWithToken($token)
    {
        return view('partials.login.forgot-passwod', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword){
            return redirect()->route('login')->with(array(
                'error' => 'Token Invalido!!'
            ));
        }else{
            User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where(['email'=> $request->email])->delete();
            return redirect()->route('login')->with(array(
                'success' => 'Su contraseña se actualizo correctamente!!'
            ));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
