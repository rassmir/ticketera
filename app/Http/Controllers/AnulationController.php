<?php

namespace App\Http\Controllers;

use App\Imports\DetailAnulationsImport;
use App\Models\Anulation;
use App\Models\CenterMedical;
use App\Models\Clinic;
use App\Models\DetailAnulation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
            ->select(['anulations.*', 'users.name_complete', 'center_medicals.name as centername',
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $clinics = Clinic::orderBy('name')->get();
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
