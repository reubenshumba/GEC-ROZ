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
        $zones = Zone::all();
        $user = auth()->user();
        if ($user->zoneID == null && $user->gecMember) {
            return view('setup', ["zones" => $zones, "campusZones" => 2]);
        } elseif ($user->zoneID != null && $user->gecMember) {
            foreach ($zones as $zone) {
                $zoneUrl = $zone != null ? $zone->url : "902930208403893403";
            }
            return redirect()->route("zone-register-create",
                ["url" => $zoneUrl]);
        } else {

            return redirect("/",['message' => ' No unique link found for you',"alert"=>"warning","title"=>"warning"]);
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

        if ($validated["gec"] == "church" || $validated["gec"] == "campus") {
            $user->gecMember = true;
            $user->zoneID = $validated["zone"];
            $user->save();
            $zone = Zone::find($user->zoneID);
            return redirect()
                ->route("zone-register-create", ["url" => $zone->url])
                ->with(["success", "Please do register name(s) of those reach out"]);
        } else {

            $user->gecMember = false;
            $user->save();

            return redirect()
                ->route("/")
                ->with(["success", "Welcome, Please do register the names() of those reach out"]);
        }
    }
}
