<?php

namespace App\Http\Controllers;

use App\Imports\DetailAnulationsImport;
use App\Mail\AnulationMail;
use App\Models\Anulation;
use App\Models\CenterMedical;
use App\Models\Clinic;
use App\Models\ClinicUser;
use App\Models\Requeriment;
use App\Models\DetailAnulation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AnulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clinic_name = trim($request->get('clinic_name'));
        $center_name = trim($request->get('center_name'));
        $clinics = Clinic::orderBy('name')->get();
        $centers = CenterMedical::orderBy('name')->get();
        $params = [
            ['clinics.name', 'LIKE', '%' . $clinic_name . '%'],
            ['center_medicals.name', 'LIKE', '%' . $center_name . '%']
        ];
        $anulations = Anulation::join('clinics', 'clinics.id', '=', 'anulations.clinic_id')
            ->join('center_medicals', 'center_medicals.id', '=', 'anulations.center_medical_id')
            ->join('professionals', 'professionals.id', '=', 'anulations.professional_id')
            ->join('especialities', 'especialities.id', '=', 'anulations.especiality_id')
            ->join('users', 'users.id', '=', 'anulations.user_id')
            ->select(['anulations.*', 'users.name_complete', 'clinics.name as clinicname','center_medicals.name as centername',
                'professionals.name as profname', 'especialities.name as espname'])
            ->where($params)
            ->get();
        return view('anulation.index',
            [
                'clinics' => $clinics,
                'centers' => $centers,
                'anulations' => $anulations
            ]);
    }

    //BETA
    public function excel($ticket)
    {

        return view('anulation.excel', [
            'ticket' => $ticket
        ]);
    }

    public function importexcel(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,xlx,xls,xlsx'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->with(array(
                'error' => 'Error al guardar !!'
            ));
        }
        Excel::import(new DetailAnulationsImport($request->input('number_ticket')), $request->file('file'));

        return redirect()->route('app.anulation.detailanulation')->with(array(
            'success' => 'Importado Correctamente !!'
        ));
    }

    public function detailAnulation(Request $request)
    {
        $n_ticket = trim($request->get('n_ticket'));
        $params = [
            ['number_ticket', 'LIKE', '%' . $n_ticket . '%']
        ];
        $details = DetailAnulation::where($params)->get();
        return view('anulation.detail-excel', [
            'details' => $details
        ]);
    }

    public function showDetailAnulation($id)
    {
        $detailanulation = DetailAnulation::findOrFail($id);
        return view('anulation.show-detail-anulation', [
            'detailanulation' => $detailanulation
        ]);
    }


    public function editDetailAnulation($id)
    {
        $detailanulation = DetailAnulation::findOrFail($id);
        return view('anulation.edit-detail-anulation', [
            'detailanulation' => $detailanulation
        ]);
    }

    public function updateDetailAnulation(Request $request, $id)
    {
        try {
            $detailAnulation = DetailAnulation::findOrFail($id);
            $detailAnulation->date_anulation = $request->input('date_anulation');
            $detailAnulation->hour = $request->input('hour');
            $detailAnulation->patient = $request->input('patient');
            $detailAnulation->name_doctor = $request->input('name_doctor');
            $detailAnulation->phone1 = $request->input('phone1');
            $detailAnulation->phone2 = $request->input('phone2');
            $detailAnulation->date_load = $request->input('date_load');
            $detailAnulation->date_close = $request->input('date_close');
            $detailAnulation->executive = $request->input('executive');
            $detailAnulation->trys = $request->input('trys');
            $detailAnulation->email = $request->input('email');
            $detailAnulation->update();
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

    public function destroyDetailAnulation($id)
    {
        $detailAnulation = DetailAnulation::findOrFail($id);
        $detailAnulation->delete($id);
        return Redirect::back()->with(array(
            'success' => 'Eliminado Correctamente !!'
        ));
    }

    public function consultingDetailTicketByID($idticket)
    {
        $ticket = DetailAnulation::where('number_ticket', '=', $idticket)
            ->where('trys', '=', Null)
            ->orWhere('trys', '=', 0)
            ->get();

        return \Response::json($ticket, 200);
    }

    public function sendEmailTicketByID($idticket)
    {
        //Retornamos los Registro que tengan un correo de la tabla detalle_anulacion con el Número de ticket -> $idticket
        $ticket = DetailAnulation::where('number_ticket', '=', $idticket)
            ->Where('email', '<>', '')
            ->get();
            
            
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: banmedica.test@codishark.com'."\r\n".'X-Mailer: PHP/' . phpversion();
                
        // Enviamos los correos
        foreach ($ticket as $tick) {
            $mensaje = '<body style="font-family: arial;">
		<br><br>
    	<div style="max-width: 700px; margin: auto; border: 1px solid #DDD; border-radius: 32px 0px 32px 0px; padding: 40px; ">
    	<img src="https://banmedica.codishark.com/assets/img/logo-color.png" width="130"><br><br>
    	<h1 style="font-size:20px;">Estimado(a) '.$tick-> patient .'</h1>
    	<h2 style="color:#274877; font-size:20px;">Estimado paciente, hemos intentado contactarlo telefónicamente para reasignar su hora, se ha generado una anulación por su especialista del día '.$tick->date_load.' a las '.$tick->hour.', lamentamos las molestias. Muchas gracias</h2> <br>
    	<div style="color:#444;">
    	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Nombre del paciente: </b> '.$tick-> patient.'</p> 
    	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Nombre del médico: </b> '.$tick->name_doctor.'</p>
    	</div>
    	<br>
    	
        </div>
        </body>';
        
            @mail($tick-> email, "Anulación de reserva de hora", $mensaje, $headers);
        
        }
            
        return \Response::json($ticket, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
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
        return view('anulation.create',
            [
                'clinics' => $clinics
            ]);
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
            $anulations = new Anulation();
            $anulations->number_ticket = $request->input('number_ticket');
            $anulations->date = date('dmy' . date('gis'));
            $anulations->clinic_id = $request->input('clinic_id');
            $anulations->branch_id = $request->input('branch_id');
            $anulations->center_medical_id = $request->input('center_medical_id');
            $anulations->unit_id = $request->input('unit_id');
            $anulations->professional_id = $request->input('professional_id');
            $anulations->especiality_id = $request->input('especiality_id');
            $anulations->anulation = $request->input('anulation');
            $anulations->message = $request->input('message');
            $anulations->state = $request->input('state');
            $anulations->user_id = Auth::user()->id;
            $anulations->save();
            try {
                $anulationsJoin = Anulation::join('clinics', 'clinics.id', '=', 'anulations.clinic_id')
                    ->join('center_medicals', 'center_medicals.id', '=', 'anulations.center_medical_id')
                    ->join('professionals', 'professionals.id', '=', 'anulations.professional_id')
                    ->join('especialities', 'especialities.id', '=', 'anulations.especiality_id')
                    ->join('units', 'units.id', '=', 'anulations.unit_id')
                    ->join('branches', 'branches.id', '=', 'anulations.branch_id')
                    ->join('users', 'users.id', '=', 'anulations.user_id')
                    ->select(['anulations.*', 'units.name as uname', 'clinics.name as clinic', 'users.name_complete', 'center_medicals.name as centername',
                        'professionals.name as profname', 'especialities.name as espname', 'branches.name as brname'])
                    ->where('anulations.date', '=', $anulations->date)
                    ->first();

                $beta = [$anulationsJoin->number_ticket,$anulationsJoin->created_at,$anulationsJoin->clinic,$anulationsJoin->brname,$anulationsJoin->centername,$anulationsJoin->uname,$anulationsJoin->profname,$anulationsJoin->espname,$anulationsJoin->anulation];
                //Mail::to('rassmirflores@gmail.com')->queue(new AnulationMail($beta));
                
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: banmedica.test@codishark.com'."\r\n".'X-Mailer: PHP/' . phpversion();
                
                $mensaje = '<body style="font-family: arial;">
            		<br><br>
            	<div style="max-width: 700px; font-family: arial; margin: auto; border: 1px solid #DDD; border-radius: 32px 0px 32px 0px; padding: 40px; ">
            	<img src="https://banmedica.codishark.com/assets/img/logo-color.png" width="130"><br><br>
            	<h1 style="font-size:24px;">Estimado(a)</h1>
            	<h2 style="color:#274877; font-size:20px;">Se le ha asignado el requerimiento y es importante informar correctamente la anulación y verificar posibilidad de reagendamiento. Muchas gracias.</h2> <br>
            	<div style="color:#444;">
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Número de Anulación: </b> '.$anulationsJoin->number_ticket.'</p>
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Fecha de registro: </b> '.$anulationsJoin->created_at.'</p> 
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Clinica: </b> '.$anulationsJoin->clinic.'</p> 
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Sucursal: </b> '.$anulationsJoin->brname.'</p> 
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Centro Médico: </b> '.$anulationsJoin->centername.'</p> 
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Unidades: </b> '.$anulationsJoin->uname.'</p> 
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Profesionales: </b> '.$anulationsJoin->profname.'</p> 
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Especialidad: </b> '.$anulationsJoin->espname.'</p> 
            	<p style="margin-bottom: 6px; margin-top: 6px;"><b>Motivo Anulación: </b> '.$anulationsJoin->anulation.'</p> 
            	</div>
            	<br><br>
            	<a href="https://banmedica.codishark.com/" style="margin-top:20px; text-decoration: none; background-color: #274877; padding: 12px; color:white; border-radius: 8px; font-weight: bold;"> Atender Anulación</a>
            	
                </div>
                </body>';
    
                @mail("vquintero@clinicasantamaria.cl, daniel.delafuente@clinicasantamaria.cl, mduran@clinicasantamaria.cl, carol.morales@grupokonecta.com", "Nueva anulación Clínica Santa María", $mensaje, $headers);
                
                
                
                
            } catch (Exception $ex) {
                Log::error($ex);
            }
            return redirect()->route('app.anulation.excel', ['ticket' => $request->input('number_ticket')])->with(array(
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
        $anulation = Anulation::join('clinics', 'clinics.id', '=', 'anulations.clinic_id')
            ->join('branches', 'branches.id', '=', 'anulations.branch_id')
            ->join('center_medicals', 'center_medicals.id', '=', 'anulations.center_medical_id')
            ->join('units', 'units.id', '=', 'anulations.unit_id')
            ->join('professionals', 'professionals.id', '=', 'anulations.professional_id')
            ->join('especialities', 'especialities.id', '=', 'anulations.especiality_id')
            ->select(['anulations.*', 'clinics.name as clinicname',
                'center_medicals.name as centername', 'professionals.name as profname',
                'branches.name as braname', 'units.name as unitname', 'especialities.name as espname'])
            ->orderBy('created_at', 'DESC')
            ->where('anulations.id', '=', $id)
            ->first();
        return view('anulation.show-anulation',
            ['anulation' => $anulation,
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

//        $anulation = Anulation::findOrFail($id);
        $anulation = Anulation::join('clinics', 'clinics.id', '=', 'anulations.clinic_id')
            ->join('branches', 'branches.id', '=', 'anulations.branch_id')
            ->join('center_medicals', 'center_medicals.id', '=', 'anulations.center_medical_id')
            ->join('units', 'units.id', '=', 'anulations.unit_id')
            ->join('professionals', 'professionals.id', '=', 'anulations.professional_id')
            ->join('especialities', 'especialities.id', '=', 'anulations.especiality_id')
            ->select(['anulations.*', 'clinics.name as clinicname', 'clinics.id as clinicid',
                'center_medicals.name as centername', 'center_medicals.id as centerid', 'professionals.name as profname', 'professionals.id as profid',
                'branches.name as braname', 'branches.id as branid', 'units.name as unitname', 'units.id as unitid', 'especialities.name as espname', 'especialities.id as espid'])
            ->orderBy('created_at', 'DESC')
            ->where('anulations.id', '=', $id)
            ->first();
        return view('anulation.edit-anulation',
            [
                'anulation' => $anulation,
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
            $anulation = Anulation::findOrFail($id);
            $anulation->clinic_id = $request->input('clinic_id');
            $anulation->branch_id = $request->input('branch_id');
            $anulation->center_medical_id = $request->input('center_medical_id');
            $anulation->unit_id = $request->input('unit_id');
            $anulation->professional_id = $request->input('professional_id');
            $anulation->especiality_id = $request->input('especiality_id');
            $anulation->anulation = $request->input('anulation');
            $anulation->message = $request->input('message');
            $anulation->state = $request->input('state');
            $anulation->update();
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
