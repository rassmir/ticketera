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
        Mail::send('email.reset', ['token' => $token, 'url' => env('APP_URL')], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Resetear Contraseña');
        });

        return Redirect::back()->with(array(
            'success' => 'Se envio correo !!'
        ));
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
