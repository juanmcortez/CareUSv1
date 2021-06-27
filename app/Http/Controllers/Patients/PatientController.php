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

        $personas = Persona::orderBy('last_name')
            ->orderBy('first_name')
            ->orderBy('middle_name')
            ->where('owner_type', 'patient')
            ->get();

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
        $title = __(":name Ledger", ["name" => $patient->persona->formated_name]);
        $description = __(":name Ledger", ["name" => $patient->persona->formated_name]);

        return view('pages.patients.show', compact('title', 'description', 'patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
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
        //
    }
}
