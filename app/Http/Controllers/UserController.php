<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\Clinic;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

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

    public function index(Request $request)
    {

        $roles = Role::orderBy('name')->get();
        $role_id = trim($request->get('role_id'));
        $rut = trim($request->get('rut'));
        $params = [
            ['roles.id', 'LIKE', '%' . $role_id . '%'],
            ['users.rut', 'LIKE', '%' . $rut . '%']
        ];
        $users = RoleUser::join('users', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select(['users.*', 'roles.display_name as rolname'])
            ->where($params)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('user.index',
            ['users' => $users,
                'roles' => $roles
            ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->hasRole('administrador')) {
                return redirect()->intended('/buscar-usuarios');
            } else {
                return redirect()->intended('/buscar-requerimientos');
            }
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
        $clinics = Clinic::orderBy('name')->get();
        $roles = Role::orderBy('name')->get();
        return view('user.create',
            ['roles' => $roles,
                'clinics' => $clinics
            ]);
    }

    public function downloadPlantilla()
    {
        return response()->download(storage_path('app/public/' . 'plantilla.xlsx'));
    }

    public function importuser(Request $request)
    {
        Excel::import(new UsersImport(), $request->file('excel'));
        return redirect()->route('app.user.index')->with(array(
            'success' => 'Importado Correctamente !!'
        ));
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
            $users = User::where('email', $request->email)->get();
            if (sizeof($users) > 0){
                return Redirect::back()->with(array(
                    'error' => 'Este correo ya existe!!'
                ));
            }

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
            $user->clinic()->attach($request->input('clinic_id'));
            return redirect()->route('app.user.index')->with(array(
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
        $clinics = Clinic::orderBy('name')->get();
        $roles = Role::orderBy('name')->get();
        $user = User::findOrFail($id);
        return view('user.show',
            [
                'user' => $user,
                'roles' => $roles,
                'clinics' => $clinics
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinics = Clinic::orderBy('name')->get();
        $roles = Role::orderBy('name')->get();
        $user = User::findOrFail($id);
        return view('user.edit',
            [
                'user' => $user,
                'roles' => $roles,
                'clinics' => $clinics
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
            $user->clinic()->detach();
            $user->clinic()->attach($request->input('clinic_id'));
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
