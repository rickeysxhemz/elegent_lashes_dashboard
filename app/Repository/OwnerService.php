<?php

namespace App\Repository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OwnerService
{
    public function LoginPage()
    {
        return view('dashboard.signin-one');
    }
    public function login($request)
    {
        $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if ($user->hasRole('owner')) {
                    Auth::login($user);
                    return redirect()->route('owner.dashboard')->with('message', 'You are logged in');
                } else {
                    return redirect()->back()->with('error', 'You are not authorized to login');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid password');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid phone number');
        }
    }
    public function dashboard()
    {
        return view('dashboard.owner.index');
    }

}