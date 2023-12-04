<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\LocationUser;
use App\Models\Location;
class ManagerController extends Controller
{
    public function managerSettings()
    {
        $locations =Location::all();
        return view('manager.city', compact('locations'))->with('message', 'Update your location');
    }
    public function updateLocation(Request $request)
    {
        if(!Auth::user()->hasRole('manager')){
            return redirect()->route('home')->with('message', 'You are not authorized to access this page');
        }
        $request->validate([
            'location' => 'required'
        ]);
        // DB::transaction();
        $location=LocationUser::where('user_id',Auth::user()->id)->first();
        if($location){
            $location->location_id = $request->location;
            $location->save();
            return redirect()->route('user.checkin')->with('message', 'Location updated successfully');
        }else{

            $location_user = new LocationUser();
            $location_user->user_id = Auth::user()->id;
            $location_user->location_id = $request->location;
            $location_user->save();
            
            return redirect()->route('user.checkin')->with('message', 'Location updated successfully');          
        }
        return redirect()->back()->with('error', 'Something went wrong, please try again later');
    }
}
