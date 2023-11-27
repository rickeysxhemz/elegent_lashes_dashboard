<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\LocationUser;

class ManagerController extends Controller
{
    public function managerSettings()
    {
        $locations =LocationUser::all();
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
        $old_location=LocationUser::where('user_id', Auth::user()->id)->first();
        if($old_location){
            $old_location->user_id = null;
            $old_location->save();
        }
        $location = LocationUser::where('id', $request->location)->first();
        if($location){
        $location->user_id = Auth::user()->id;
        $location->save();
        return redirect()->route('user.checkin')->with('message', 'Location updated successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong, please try again later');
    }
}
