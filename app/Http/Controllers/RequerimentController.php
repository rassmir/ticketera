<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\CenterMedical;
use App\Models\Clinic;
use App\Models\Especiality;
use App\Models\Professional;
use App\Models\Requeriment;
use App\Models\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $clinics = Clinic::orderBy('name')->get();
        $rq_id = trim($request->get('rq_id'));
        $clinic_id = trim($request->get('clinic_id'));
        $params = [
            ['requeriments.id', 'LIKE', '%' . $rq_id . '%'],
            ['clinics.id', 'LIKE', '%' . $clinic_id . '%']
        ];
        $requeriments = Requeriment::join('clinics', 'clinics.id', '=', 'requeriments.clinic_id')
            ->join('center_medicals', 'center_medicals.id', '=', 'requeriments.center_medical_id')
            ->join('professionals', 'professionals.id', '=', 'requeriments.professional_id')
            ->select(['requeriments.*', 'clinics.name as clinicname', 'center_medicals.name as centername', 'professionals.name as profname'])
            ->where($params)
            ->get();
        return view('requeriment.index',
            ['requeriments' => $requeriments,
             'clinics' => $clinics
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
        return view('requeriment.create',
            ['clinics' => $clinics]);
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
            $requeriments->date_last = $request->input('date_last');
            $requeriments->date_response = $request->input('date_response');
            $requeriments->email = $request->input('email');
            $requeriments->observation = $request->input('observation');
            $requeriments->response_medic = $request->input('response_medic');
            $requeriments->name_professional = $request->input('name_professional');
            $requeriments->resumen = $request->input('resumen');
            $requeriments->date_solution = $request->input('date_solution');
            $requeriments->user_create = $request->input('user_create');
            $requeriments->date_close = $request->input('date_close');
            $requeriments->user_close = $request->input('user_close');
            $requeriments->save();
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
        $requeriment = Requeriment::findOrFail($id);
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
            $requeriment->date_last = $request->input('date_last');
            $requeriment->date_response = $request->input('date_response');
            $requeriment->email = $request->input('email');
            $requeriment->observation = $request->input('observation');
            $requeriment->response_medic = $request->input('response_medic');
            $requeriment->name_professional = $request->input('name_professional');
            $requeriment->resumen = $request->input('resumen');
            $requeriment->date_solution = $request->input('date_solution');
            $requeriment->user_create = $request->input('user_create');
            $requeriment->date_close = $request->input('date_close');
            $requeriment->user_close = $request->input('user_close');
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
}
