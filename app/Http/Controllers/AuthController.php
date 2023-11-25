<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helper\Helper;
use Exception;

class AuthController extends Controller
{
    public function managerLogin(Request $request)
    {
        try{
        $request->only('phone', 'password');
        $user = User::where('phone_number', $request->phone)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if ($user->hasRole('manager')) {
                    Auth::login($user);
                    return redirect()->route('manager.settings')->with('message', 'You are logged in');
                } else {
                    return redirect()->back()->with('error', 'You are not authorized to login');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid password');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid phone number');
        }
    }catch(Exception $e){
        $error = "Error: Message: " . $e->getMessage() . " File: " . $e->getFile() . " Line #: " . $e->getLine();
        Helper::errorLogs("AuthController->Managerlogin()", $error);
        return redirect()->back()->with('error', 'Something went wrong');
    }
    }
}
