<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // if(auth()->user()->hasRole('manager')){
        //     return redirect()->route('manager.settings');
        // }
        $managers = User::whereHas('roles', function ($query) {
            $query->where('name', 'manager');
        })->get();
        return view('index', compact('managers'));
    }
    
}
