<?php

namespace App\Http\Controllers;

use App\Models\CampusZone;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;

class SetupController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $zone = Zone::all();
        $cmZone = CampusZone::all();
        $user = auth()->user();
        if ($user->zoneID == null && $user->cmzoneID == null && $user->arm == null && $user->gecMember) {
            return view('setup', ["zones" => $zone, "campusZones" => $cmZone]);
        }else{
            $url =1;
           return redirect()->route("zone-register",["url"=>$url]);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function save(Request $request)
    {

        $validated = $request->validate([
            'gec' => 'required|not_in:-1',
            'zone' => 'required|not_in:-1',
        ]);
        $user = auth()->user();
        $user = User::find($user->id);

        if ($validated["gec"] == "church") {
            $user->gecMember = true;
            $user->arm = $validated["gec"];
            $user->zoneID = $validated["zone"];
            $user->save();
            $zone=Zone::find($user->zoneID);
            redirect()->route("register",["url"=>$zone->url])->with(["success", "Please do register the names of those reachout"]);
        } elseif ($validated["gec"] == "campus") {
            $user->arm = $validated["gec"];
            $user->gecMember = true;
            $user->cmzoneID = $validated["zone"];
            $user->save();
            $zone=CampusZone::find($user->cmzoneID);
            redirect()->route("zone-register",["url"=>$zone->url])->with(["success", "Please do register the names of those reachout"]);
        } else {
            $user->arm = null;
            $user->gecMember = false;
            $user->save();
            redirect()->route("/")->with(["success", "Welcome, Please do register the names of those reachout"]);
        }
    }
}
