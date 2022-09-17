<?php

namespace App\Http\Controllers;

use App\Models\CampusZone;
use App\Http\Requests\StoreCampusZoneRequest;
use App\Http\Requests\UpdateCampusZoneRequest;

class CampusZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCampusZoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCampusZoneRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CampusZone  $campusZone
     * @return \Illuminate\Http\Response
     */
    public function show(CampusZone $campusZone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CampusZone  $campusZone
     * @return \Illuminate\Http\Response
     */
    public function edit(CampusZone $campusZone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCampusZoneRequest  $request
     * @param  \App\Models\CampusZone  $campusZone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCampusZoneRequest $request, CampusZone $campusZone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CampusZone  $campusZone
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampusZone $campusZone)
    {
        //
    }
}
