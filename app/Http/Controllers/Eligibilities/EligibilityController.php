<?php

namespace App\Http\Controllers\Eligibilities;

use App\Http\Controllers\Controller;
use App\Models\Eligibilities\Eligibility;
use Illuminate\Http\Request;

class EligibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __("Eligibility Dashboard");
        $description = __("Control the eligibilities in your practice.");

        return view('pages.eligibilities.index', compact('title', 'description'));
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
     * @param  \App\Models\Eligibilities\Eligibility  $eligibility
     * @return \Illuminate\Http\Response
     */
    public function show(Eligibility $eligibility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eligibilities\Eligibility  $eligibility
     * @return \Illuminate\Http\Response
     */
    public function edit(Eligibility $eligibility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eligibilities\Eligibility  $eligibility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eligibility $eligibility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eligibilities\Eligibility  $eligibility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eligibility $eligibility)
    {
        //
    }
}
