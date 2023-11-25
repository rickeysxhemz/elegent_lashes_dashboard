<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function managerSettings()
    {
        $location = User::where('id', auth()->user()->id)->pluck('location')->first();
        return view('manager.city', compact('location'))->with('message', 'Update your location');
    }
    public function updateLocation(Request $request)
    {
        if(!Auth::user()->hasRole('manager')){
            return redirect()->route('home');
        }
        $request->validate([
            'location' => 'required'
        ]);
        $user = User::find(auth()->user()->id);
        $user->location = $request->location;
        $user->save();
        return redirect()->back()->with('message', 'Location updated successfully');
    }
}
