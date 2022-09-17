<?php

namespace App\Http\Controllers;

use App\Models\CampusZone;
use App\Models\RozRegister;
use App\Http\Requests\StoreRozRegisterRequest;
use App\Http\Requests\UpdateRozRegisterRequest;
use App\Models\Zone;

class RozRegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index($url)
    {
        $user = auth()->user();
        if ($user->zoneID != null && $user->arm != null && $user->cmzoneID == null && $user->gecMember) {
            $zone=Zone::find($user->zoneID);
            return view('zones.register', ["zones" => $zone]);
        }elseif ($user->zoneID == null && $user->cmzoneID != null && $user->arm != null && $user->gecMember) {
            $zone=CampusZone::find($user->cmzoneID);
            return view('zones.register', ["zones" => $zone]);
        }elseif ($user->zoneID == null && $user->cmzoneID == null && $user->arm == null && $user->gecMember) {
            return redirect()-route("setup");
        }else {
            return redirect("/");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRozRegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRozRegisterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RozRegister  $rozRegister
     * @return \Illuminate\Http\Response
     */
    public function show(RozRegister $rozRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RozRegister  $rozRegister
     * @return \Illuminate\Http\Response
     */
    public function edit(RozRegister $rozRegister)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRozRegisterRequest  $request
     * @param  \App\Models\RozRegister  $rozRegister
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRozRegisterRequest $request, RozRegister $rozRegister)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RozRegister  $rozRegister
     * @return \Illuminate\Http\Response
     */
    public function destroy(RozRegister $rozRegister)
    {
        //
    }
}
