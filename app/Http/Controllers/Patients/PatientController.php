<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Models\Patients\Patient;
use App\Models\Personas\Persona;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __("Patient's list");
        $description = __("Full list of available patients in your practice.");

        // Don't use eager loading on a lage dataset. with() prevents it!
        $personas = Persona::where('owner_type', 'patient')
            ->orderByRaw('last_name ASC, first_name ASC, middle_name ASC')
            ->with('patient', 'phone')
            ->paginate(15);

        return view('pages.patients.index', compact('title', 'description', 'personas'));
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
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $title = __(":name's Ledger", ["name" => $patient->persona->last_name . ', ' . $patient->persona->first_name]);
        $description = __(":name's Ledger", ["name" => $patient->persona->last_name . ', ' . $patient->persona->first_name]);

        return view('pages.patients.show', compact('title', 'description', 'patient'));
    }

    /**
     * Display the detailsof the specified resource.
     *
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function detail(Patient $patient)
    {
        $title = __(":name's Demographic details", ["name" => $patient->persona->last_name . ', ' . $patient->persona->first_name]);
        $description = __(":name's Demographic details", ["name" => $patient->persona->last_name . ', ' . $patient->persona->first_name]);

        return view('pages.patients.detail', compact('title', 'description', 'patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $title = __(":name's Demographic edit", ["name" => $patient->persona->last_name . ', ' . $patient->persona->first_name]);
        $description = __(":name's Demographic edit", ["name" => $patient->persona->last_name . ', ' . $patient->persona->first_name]);

        return view('pages.patients.edit', compact('title', 'description', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->persona->delete();
        $patient->delete();

        return redirect(route('patient.list'))->with('success', __('Patient successfully deleted.'));
    }
}
