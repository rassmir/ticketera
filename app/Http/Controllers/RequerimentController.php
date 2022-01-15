<?php

namespace App\Http\Controllers;

use App\Mail\ProfeRequeriment;
use App\Models\Branch;
use App\Models\CenterMedical;
use App\Models\Clinic;
use App\Models\ClinicUser;
use App\Models\Especiality;
use App\Models\Professional;
use App\Models\Requeriment;
use App\Models\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class RequerimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clinics = '';
        $requeriments = '';
        $rq_name = trim($request->get('rq_name'));
        $clinic_name = trim($request->get('clinic_name'));
        
        $origen = trim($request->get('or'));
        
        if($origen == "dash"){
            $acc = trim($request->get('acc'));
            
            if($acc == "cad"){
                $params = [
                    ['requeriments.status_close', '=', 'caducado']
                ];
            }else if($acc == "pro"){
                $params = [
                    ['requeriments.status_close', '=', 'proceso']
                ];
            }else if($acc == "clism"){
                $params = [
                    ['requeriments.status_close', '=', 'caducado'],
                    ['requeriments.clinic_id', '=', '2']
                ];
            }else if($acc == "clivs"){
                $params = [
                    ['requeriments.status_close', '=', 'caducado'],
                    ['requeriments.clinic_id', '=', '4']
                ];
            }else if($acc == "in"){
                $params = [
                    ['requeriments.state', '=', 'Ingresado']
                ];
            }else if($acc == "ce"){
                $params = [
                    ['requeriments.state', '=', 'Cerrado']
                ];
            }else if($acc == "pr"){
                $params = [
                    ['requeriments.state', '=', 'Proceso']
                ];
            }
            
            
        }else{
            $params = [
                ['requeriments.number_solicity', 'LIKE', '%' . $rq_name . '%'],
                ['clinics.name', 'LIKE', '%' . $clinic_name . '%']
            ];
        }
        
        

        $requeriments = Requeriment::join('clinics', 'clinics.id', '=', 'requeriments.clinic_id')
            ->join('branches', 'branches.id', '=', 'requeriments.branch_id')
            ->join('units', 'units.id', '=', 'requeriments.unit_id')
            ->join('center_medicals', 'center_medicals.id', '=', 'requeriments.center_medical_id')
            ->join('professionals', 'professionals.id', '=', 'requeriments.professional_id')
            ->join('especialities', 'especialities.id', '=', 'requeriments.especiality_id')
            ->select(['requeriments.*', 'clinics.name as clinicname', 'branches.name as branchname', 'units.name as unitname', 'center_medicals.name as centername', 'professionals.name as profname', 'especialities.name as spename'])
            ->where($params)
            ->get();

        if (Auth::user()->hasRole('usuario')) {
            $requeriments = [];
            $clinics = ClinicUser::join('clinics', 'clinics.id', '=', 'clinic_user.clinic_id')
                ->select(['clinics.name', 'clinic_id'])
                ->where('user_id', '=', Auth::user()->id)
                ->get();
            foreach ($clinics as $clinic) {
                array_push($requeriments, Requeriment::join('clinics', 'clinics.id', '=', 'requeriments.clinic_id')
                    ->join('branches', 'branches.id', '=', 'requeriments.branch_id')
                    ->join('units', 'units.id', '=', 'requeriments.unit_id')
                    ->join('center_medicals', 'center_medicals.id', '=', 'requeriments.center_medical_id')
                    ->join('professionals', 'professionals.id', '=', 'requeriments.professional_id')
                    ->join('especialities', 'especialities.id', '=', 'requeriments.especiality_id')
                    ->select(['requeriments.*', 'clinics.name as clinicname', 'branches.name as branchname', 'units.name as unitname', 'center_medicals.name as centername', 'professionals.name as profname', 'especialities.name as spename'])
                    ->where($params)
                    ->where('requeriments.clinic_id', '=', $clinic->clinic_id)
                    ->get());
            }
//            dd($requeriments);
        } else {
            $clinics = Clinic::orderBy('name')->get();
        }
        return view('requeriment.index',
            ['requeriments' => $requeriments,
                'clinics' => $clinics,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function branches($idclinica)
    {
        $branches = Branch::where('clinic_id', '=', $idclinica)->get();
        return \Response::json($branches, 200);
    }

    public function centers($idbranch)
    {
        $centers = CenterMedical::where('branch_id', '=', $idbranch)->get();
        return \Response::json($centers, 200);
    }

    public function units($idcenter)
    {
        $units = Unit::where('center_medical_id', '=', $idcenter)->get();
        return \Response::json($units, 200);
    }

    public function professionals($idunit)
    {
        $professionals = Professional::where('unit_id', '=', $idunit)->get();
        return \Response::json($professionals, 200);
    }

    public function especialities($idprofessional)
    {
        $especialities = Especiality::where('professional_id', '=', $idprofessional)->get();
        return \Response::json($especialities, 200);
    }

    public function create()
    {
        $clinics = Clinic::orderBy('name')->get();
        if (Auth::user()->hasRole('usuario')) {
            $requeriments = [];
            $clinics = ClinicUser::join('clinics', 'clinics.id', '=', 'clinic_user.clinic_id')
                ->select(['clinics.name', 'clinic_id as id'])
                ->where('user_id', '=', Auth::user()->id)
                ->get();
            foreach ($clinics as $clinic) {
                array_push($requeriments, Requeriment::join('clinics', 'clinics.id', '=', 'requeriments.clinic_id')
                    ->join('branches', 'branches.id', '=', 'requeriments.branch_id')
                    ->join('units', 'units.id', '=', 'requeriments.unit_id')
                    ->join('center_medicals', 'center_medicals.id', '=', 'requeriments.center_medical_id')
                    ->join('professionals', 'professionals.id', '=', 'requeriments.professional_id')
                    ->join('especialities', 'especialities.id', '=', 'requeriments.especiality_id')
                    ->select(['requeriments.*', 'clinics.name as clinicname', 'branches.name as branchname', 'units.name as unitname', 'center_medicals.name as centername', 'professionals.name as profname', 'especialities.name as spename'])
                    ->where('requeriments.clinic_id', '=', $clinic->clinic_id)
                    ->get());
            }
//            dd($requeriments);
        } else {
            $clinics = Clinic::orderBy('name')->get();
        }

        //$clinics = Clinic::orderBy('name')->get();
        return view('requeriment.create',
            ['clinics' => $clinics]);
    }

    public function getSlaByProffesional($id)
    {
        $sla = Professional::select('sla')
            ->where('id', '=', $id)->first();
        return \Response::json($sla, 200);
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
            $requeriments = new Requeriment();
            $requeriments->number_solicity = $request->input('number_solicity');
            $requeriments->type = $request->input('type');
            $requeriments->datetime_local = $request->input('datetime_local');
            $requeriments->state = $request->input('state');
            $requeriments->rut = $request->input('rut');
            $requeriments->name = $request->input('name');
            $requeriments->father_name = $request->input('father_name');
            $requeriments->mother_name = $request->input('mother_name');
            $requeriments->phone1 = $request->input('phone1');
            $requeriments->phone2 = $request->input('phone2');
            $requeriments->fije1 = $request->input('fije1');
            $requeriments->clinic_id = $request->input('clinic_id');
            $requeriments->branch_id = $request->input('branch_id');
            $requeriments->center_medical_id = $request->input('center_medical_id');
            $requeriments->unit_id = $request->input('unit_id');
            $requeriments->professional_id = $request->input('professional_id');
            $requeriments->especiality_id = $request->input('especiality_id');
            $requeriments->date = $request->input('date');
            $requeriments->date_he = $request->input('date_he');
            $requeriments->date_response = $request->input('date_response');
            $requeriments->email = $request->input('email');
            $requeriments->description1 = $request->input('description1');
            $requeriments->description2 = $request->input('description2');
            $requeriments->description3 = $request->input('description3');
            $requeriments->response_medic = $request->input('response_medic');
            $requeriments->date_solution = $request->input('date_solution');
            $requeriments->user_create = $request->input('user_create');
            $requeriments->date_close = $request->input('date_close');
            $requeriments->user_close = $request->input('user_close');
            $requeriments->status_close = 'proceso';
            $requeriments->save();
            
            if(!$requeriments){
                App::abort(500, 'Error');
            }else{
                
                $nombre_clinica =  Clinic::select('name')->where('id', '=', $request->input('clinic_id'))->first();
                $nombre_centro_medico =  CenterMedical::select('name')->where('id', '=', $request->input('center_medical_id'))->first();
                
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: banmedica.test@codishark.com'."\r\n".'X-Mailer: PHP/' . phpversion();
                
                $mensaje = '<body style="font-family: arial;">
		        <br><br>
            	<div style="max-width: 700px; font-family: arial; margin: auto; border: 1px solid #DDD; border-radius: 32px 0px 32px 0px; padding: 40px; ">
            	<img src="https://banmedica.codishark.com/assets/img/logo-color.png" width="130"><br>
            	<h1 style="font-size:24px;">Estimado ejecutivo</h1>
            	<h2 style="color:#274877; font-size:20px;">Por favor tomar conciencia que nuestro paciente está a la espera de una pronta respuesta, recordar que tenemos 72 horas para responder.</h2><br>
            
                <p style="margin-bottom: 6px; margin-top: 6px;"><b>Código de requerimiento: </b> '.$request->input('number_solicity').'</p> 
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Tipo de requerimiento: </b> '.$request->input('type').'</p> 
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Fecha de registro: </b> '.$request->input('datetime_local').'</p> 
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Nombre de prestador: </b> '.$nombre_clinica->name.'</p> 
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Nombre de centro médico: </b> '.$nombre_centro_medico->name.'</p> 
            	<br>
            	<p>por favor reasignar ticket en el caso que no le corresponda a su unidad.</p>
            	<br>
            	<a href="https://banmedica.codishark.com/" target="_blank" style="margin-top:20px; text-decoration: none; background-color: #274877; padding: 12px; color:white; border-radius: 8px; font-weight: bold;"> Atender Requerimiento</a>
            	
                </div>
                </body>';
                
                @mail("vquintero@clinicasantamaria.cl, daniel.delafuente@clinicasantamaria.cl, mduran@clinicasantamaria.cl, csagardia@grupokonecta.com, carol.morales@grupokonecta.com", "Nuevo requerimiento - Banmedica", $mensaje, $headers);
                //@mail("dei.guiribalde@gmail.com", "Nuevo requerimiento paciente", $mensaje, $headers);
            }
            
            //METODO TRADICIONAL

            
            /*try {
                $email_professional = Requeriment::join('professionals', 'professionals.id', '=', 'requeriments.professional_id')
                    ->select(['professionals.email as correo'])
                    ->where('professionals.id', '=', $requeriments->professional_id)
                    ->first();
                Mail::to($email_professional->correo)->queue(new ProfeRequeriment($requeriments));
                
            } catch (Exception $ex) {
                Log::error($ex);
            }*/

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
        $clinics = Clinic::orderBy('name')->get();
        $requeriment = Requeriment::join('clinics', 'clinics.id', '=', 'requeriments.clinic_id')
            ->join('branches', 'branches.id', '=', 'requeriments.branch_id')
            ->join('center_medicals', 'center_medicals.id', '=', 'requeriments.center_medical_id')
            ->join('units', 'units.id', '=', 'requeriments.unit_id')
            ->join('professionals', 'professionals.id', '=', 'requeriments.professional_id')
            ->join('especialities', 'especialities.id', '=', 'requeriments.especiality_id')
            ->select(['requeriments.*', 'clinics.name as clinicname',
                'center_medicals.name as centername', 'professionals.name as profname',
                'branches.name as braname', 'units.name as unitname', 'especialities.name as espname'])
            ->orderBy('created_at', 'DESC')
            ->where('requeriments.id', '=', $id)
            ->first();

        return view('requeriment.show',
            ['requeriment' => $requeriment,
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

        if (Auth::user()->hasRole('usuario')) {
            $requeriments = [];
            $clinics = ClinicUser::join('clinics', 'clinics.id', '=', 'clinic_user.clinic_id')
                ->select(['clinics.name', 'clinic_id as id'])
                ->where('user_id', '=', Auth::user()->id)
                ->get();
            foreach ($clinics as $clinic) {
                array_push($requeriments, Requeriment::join('clinics', 'clinics.id', '=', 'requeriments.clinic_id')
                    ->join('branches', 'branches.id', '=', 'requeriments.branch_id')
                    ->join('units', 'units.id', '=', 'requeriments.unit_id')
                    ->join('center_medicals', 'center_medicals.id', '=', 'requeriments.center_medical_id')
                    ->join('professionals', 'professionals.id', '=', 'requeriments.professional_id')
                    ->join('especialities', 'especialities.id', '=', 'requeriments.especiality_id')
                    ->select(['requeriments.*', 'clinics.name as clinicname', 'branches.name as branchname', 'units.name as unitname', 'center_medicals.name as centername', 'professionals.name as profname', 'especialities.name as spename'])
                    ->where('requeriments.clinic_id', '=', $clinic->clinic_id)
                    ->get());
            }
//            dd($requeriments);
        } else {
            $clinics = Clinic::orderBy('name')->get();
        }


//        $requeriment = Requeriment::findOrFail($id);
        $requeriment = Requeriment::join('clinics', 'clinics.id', '=', 'requeriments.clinic_id')
            ->join('branches', 'branches.id', '=', 'requeriments.branch_id')
            ->join('center_medicals', 'center_medicals.id', '=', 'requeriments.center_medical_id')
            ->join('units', 'units.id', '=', 'requeriments.unit_id')
            ->join('professionals', 'professionals.id', '=', 'requeriments.professional_id')
            ->join('especialities', 'especialities.id', '=', 'requeriments.especiality_id')
            ->select(['requeriments.*', 'clinics.name as clinicname', 'clinics.id as clinicid',
                'center_medicals.name as centername', 'center_medicals.id as centerid', 'professionals.name as profname', 'professionals.id as profid',
                'branches.name as braname', 'branches.id as branid', 'units.name as unitname', 'units.id as unitid', 'especialities.name as espname', 'especialities.id as espid'])
            ->orderBy('created_at', 'DESC')
            ->where('requeriments.id', '=', $id)
            ->first();

        return view('requeriment.edit',
            [
                'requeriment' => $requeriment,
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
            $requeriment = Requeriment::findOrFail($id);
            $requeriment->type = $request->input('type');
            $requeriment->datetime_local = $request->input('datetime_local');
            $requeriment->state = $request->input('state');
            $requeriment->rut = $request->input('rut');
            $requeriment->name = $request->input('name');
            $requeriment->father_name = $request->input('father_name');
            $requeriment->mother_name = $request->input('mother_name');
            $requeriment->phone1 = $request->input('phone1');
            $requeriment->phone2 = $request->input('phone2');
            $requeriment->fije1 = $request->input('fije1');
            $requeriment->clinic_id = $request->input('clinic_id');
            $requeriment->branch_id = $request->input('branch_id');
            $requeriment->center_medical_id = $request->input('center_medical_id');
            $requeriment->unit_id = $request->input('unit_id');
            $requeriment->professional_id = $request->input('professional_id');
            $requeriment->especiality_id = $request->input('especiality_id');
            $requeriment->date = $request->input('date');
            $requeriment->date_he = $request->input('date_he');
            $requeriment->date_response = $request->input('date_response');
            $requeriment->email = $request->input('email');
            $requeriment->description1 = $request->input('description1');
            $requeriment->description2 = $request->input('description2');
            $requeriment->description3 = $request->input('description3');
            $requeriment->response_medic = $request->input('response_medic');
            $requeriment->date_solution = $request->input('date_solution');
            $requeriment->user_create = $request->input('user_create');
            $requeriment->date_close = $request->input('date_close');
            $requeriment->user_close = $request->input('user_close');
            $requeriment->status_close = $request->input('status_close');
            $requeriment->update();
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
        $requeriment = Requeriment::findOrFail($id);
        $requeriment->delete($id);
        return Redirect::back()->with(array(
            'success' => 'Eliminado Correctamente !!'
        ));
    }

    public function dashboard()
    {
        $caducado = Requeriment::where('state', '=', 'Ingresado')->count();
        $proceso = Requeriment::where('state', '=', 'Proceso')->count();
        $exitoso = Requeriment::where('state', '=', 'Cerrado')->count();
        $total = $proceso + $exitoso + $caducado;
        return view('requeriment.dashboard', [
            'caducado' => $caducado,
            'proceso' => $proceso,
            'exitoso' => $exitoso,
            'total' => $total
        ]);
    }

    public function grafic1()
    {
        $data = [];
        $caducado = Requeriment::where('status_close', '=', 'caducado')->count();
        $proceso = Requeriment::where('status_close', '=', 'proceso')->count();
        $exitoso = Requeriment::where('status_close', '=', 'exitoso')->count();
        $total = $proceso + $exitoso;
        $data = array($caducado, $total);
        return \Response::json($data, 200);
    }

    public function grafic2()
    {
        $clinic = Clinic::select('name')->get();
        $total = Requeriment::groupBy('clinic_id')->select(DB::raw('count(*) as total'))->where('status_close', '=', 'caducado')->get();
        $data = [];
        $data2 = [];
        foreach ($clinic as $cli) {
            array_push($data, $cli->name);
        }
        foreach ($total as $tot) {
            array_push($data2, $tot->total);
        }
        $data3 = [$data, $data2];
        return \Response::json($data3, 200);
    }

    public function grafic3()
    {
        $exitoso = Requeriment::where('status_close', '=', 'exitoso')->count();
        $caducado = Requeriment::where('status_close', '=', 'caducado')->count();
        $proceso = Requeriment::where('status_close', '=', 'proceso')->count();

        $total = $proceso + $caducado + $exitoso;
        $total2 = ($exitoso / $total) * 100;
        $total3 = ($caducado + $proceso);
        $total4 = ($total3 / $total) * 100;
        $data = [number_format($total2, 2, '.', ' '), number_format($total4, 2, '.', ' ')];

        return \Response::json($data, 200);
    }

    public function grafic4()
    {
        
        $clinic = Requeriment::join('clinics', 'clinics.id', '=', 'requeriments.clinic_id')
            ->groupBy('requeriments.clinic_id')
            ->select('clinic_id')
            ->get();
            
            //Buscamos las clinicas
        $clinicas = Clinic::select()->get();
        
        //return $clinicas;
        
        $data_general = Array();
        
        foreach($clinicas as $clave => $valor){
            $exitoso = Requeriment::where('status_close', '=', 'exitoso')->where('clinic_id', '=', $valor['id'])->count();
            $caducado = Requeriment::where('status_close', '=', 'caducado')->where('clinic_id', '=', $valor['id'])->count();
            $proceso = Requeriment::where('status_close', '=', 'proceso')->where('clinic_id', '=', $valor['id'])->count();
    
            $total = $proceso + $caducado + $exitoso;
            $total2 = ($exitoso / $total) * 100;
            $total3 = ($caducado + $proceso);
            $total4 = ($total3 / $total) * 100;
            $data = [number_format($total2, 2, '.', ' '), number_format($total4, 2, '.', ' ')];
            
            //return \Response::json($data, 200);
            $data_general[$valor['name']]['data'] = $data;
            
        }
        return \Response::json($data_general, 200);
        //return $data_general;
        
        //dd($clinicas);
            
        //return $clinicas;
        //return \Response::json($clinic, 200);
    }
}
