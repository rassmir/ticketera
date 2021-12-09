<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }

    public function forget()
    {
        return view('password');
    }

    public function index()
    {
        $users = RoleUser::join('users', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select(['users.*', 'roles.display_name as rolname'])
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('user.index',
            ['users' => $users]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/buscar-usuarios');
        }
        return Redirect::back()->with(array(
            'error' => 'Credenciales Inválidas !!'
        ));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view('user.create',
            ['roles' => $roles]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]);
            $user = new User();
            $user->name_complete = $request->input('name_complete');
            $user->rut = $request->input('rut');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            $user->attachRole($request->input('role_id'));
            return Redirect::back()->with(array(
                'success' => 'Guardado Correctamente !!'
            ));
        } catch (Exception $ex) {
            Log::error($ex);
            return Redirect::back()->with(array(
                'error' => 'Error al guardar !!'
            ));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = RoleUser::join('users', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select(['users.*', 'roles.display_name as rolname'])
            ->orderBy('created_at', 'DESC')
            ->where('users.id', '=', $id)
            ->first();
        return view('user.show',
            ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::orderBy('name')->get();
        $user = User::findOrFail($id);
        return view('user.edit',
            [
                'user' => $user,
                'roles' => $roles
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->name_complete = $request->input('name_complete');
            $user->email = $request->input('email');
            $user->rut = $request->input('rut');
            $user->update();
            $user->role()->detach();
            $user->attachRole($request->input('role_id'));
            return Redirect::back()->with(array(
                'success' => 'Actualizado Correctamente !!'
            ));
        } catch (Exception $ex) {
            Log::error($ex);
            return Redirect::back()->with(array(
                'error' => 'Error al actualizar !!'
            ));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete($id);
        return Redirect::back()->with(array(
            'success' => 'Eliminado Correctamente !!'
        ));
    }
}
