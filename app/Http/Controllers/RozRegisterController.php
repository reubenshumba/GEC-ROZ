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
        //
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index($url)
    {
        $this->middleware('auth');
        $zone = Zone::where("url", "=", $url)->first();
        if($zone ==null){
            abort(404,"Invalid link");
        }
        $record = RozRegister::where("zoneID", "=", $zone->id)->get();
        return view("zones.view",["records"=>$record,"zone"=>$zone]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($url)
    {
        $zone = Zone::where("url", "=", $url)->first();
        if ($zone == null) {
            abort(404);
        }
        return view('zones.register', ["zone" => $zone]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRozRegisterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function save(StoreRozRegisterRequest $request, $url)
    {

        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'number' => 'required|numeric|digits:10',
            'address' => 'sometimes|min:3|max:250',
            'occupation' => 'sometimes|min:3|max:250',
            'maritalStatus' => 'required|not_in:-1',
            'saved' => 'required|not_in:-1',
            'church' => 'required|not_in:-1',
            'callMe' => 'required|not_in:-1',
            'zoneID'=>'required'
        ]);

        $roz = new RozRegister();
        $roz->name = $validated["name"];
        $roz->email = $validated["email"];
        $roz->number = $validated["number"];
        $roz->address = $validated["address"];
        $roz->occupation = $validated["occupation"];
        $roz->maritalStatus = $validated["maritalStatus"];
        $roz->saved = $validated["saved"];
        $roz->church = $validated["church"];
        $roz->callMe = $validated["callMe"];
        $roz->zoneID = $validated["zoneID"];

        $record = RozRegister::where("name", "=", $validated["name"])
            ->where("email", "=", $validated["email"])
            ->where("number", "=", $validated["number"])
            ->first();
        if ($record != null) {
            return Redirect()->back()->withErrors(['message' => 'Record already exist',"alert"=>"danger","title"=>"error"]);
        } else {
            $roz->save();
            return redirect()->route("zone-register-create", ["url" => $url])->with(['message' => 'You registration is successful',"alert"=>"success","title"=>"Successful"]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRozRegisterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRozRegisterRequest $request)
    {

        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'number' => 'required|numeric|digits:10',
            'address' => 'sometimes|min:3|max:250',
            'occupation' => 'sometimes|min:3|max:250',
            'maritalStatus' => 'required|not_in:-1',
            'saved' => 'required|not_in:-1',
            'church' => 'required|not_in:-1',
            'callMe' => 'required|not_in:-1',

        ]);

        $roz = new RozRegister();
        $roz->name = $validated["name"];
        $roz->email = $validated["email"];
        $roz->number = $validated["number"];
        $roz->address = $validated["address"];
        $roz->occupation = $validated["occupation"];
        $roz->maritalStatus = $validated["maritalStatus"];
        $roz->saved = $validated["saved"];
        $roz->church = $validated["church"];
        $roz->callMe = $validated["callMe"];
        $roz->zoneID = null;

        $record = RozRegister::where("name", "=", $validated["name"])
            ->where("email", "=", $validated["email"])
            ->where("number", "=", $validated["number"])
            ->first();

        if ($record != null) {
            return Redirect()->back()->withErrors(['message' => 'Record already exist',"alert"=>"danger",
                "title"=>"error"]);
        } else {
            $roz->save();
            return redirect()->route("")
                ->with(['message' => 'You registration is successful',"alert"=>"success",
                    "title"=>"Successful"]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\RozRegister $rozRegister
     * @return \Illuminate\Http\Response
     */
    public function show(RozRegister $rozRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\RozRegister $rozRegister
     * @return \Illuminate\Http\Response
     */
    public function edit(RozRegister $rozRegister)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRozRegisterRequest $request
     * @param \App\Models\RozRegister $rozRegister
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRozRegisterRequest $request, RozRegister $rozRegister)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RozRegister $rozRegister
     * @return \Illuminate\Http\Response
     */
    public function destroy(RozRegister $rozRegister)
    {
        //
    }
}
