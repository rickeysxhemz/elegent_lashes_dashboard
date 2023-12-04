<?php

namespace App\Repository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helper\Helper;
use Exception;
use App\Models\LocationUser;
use App\Models\ClientCheckIn;
use App\Models\ClientCheckInTechnician;
use App\Models\Service;
use Illuminate\Support\Facades\DB;


class ManagerDashboardService
{
   public function loginPage()
   {
       return view('dashboard.manager.signin-one');
   }

   public function login($request)
    {
        
        $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if ($user->hasRole('manager')) {
                    Auth::login($user);
                    return redirect()->route('manager.dashboard')->with('message', 'You are logged in');
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
        $user =LocationUser::where('user_id',Auth::user()->id)->first();
        
        if($user){
            $check_in_count = ClientCheckIn::where('location_id',$user->location_id)->where('manager_id',Auth::user()->id)->count();
            $completed  = ClientCheckInTechnician::where('location_id',$user->location_id)->where('manager_id',Auth::user()->id)->where('status','completed')->count();
            $pending  = ClientCheckInTechnician::where('location_id',$user->location_id)->where('manager_id',Auth::user()->id)->where('status','pending')->count();
            $check_ins = ClientCheckIn::with('client')
                        ->where('location_id',$user->location_id)
                        ->where('manager_id',Auth::user()->id)
                        ->where('created_at', '>=',now()->toDateString())
                       
                        ->whereDoesntHave('client_technician', function ($query) {
                            $query->where('client_check_in_id', DB::raw('client_check_ins.id'));
                        })
                        ->paginate(10);
            
            return view ('dashboard.manager.index',compact('check_in_count','completed','pending','check_ins'));
        }
        else{
         return view('dashboard.manager.blank');}
  }
  public function logout()
  {
        Auth::logout();
        return redirect()->route('manager.loginPage');
  }
  public function assignCheckInPage($id)
  {
        session(['assign_check_in_id' => $id]);
        $services=Service::all();
        $technicians=User::role('technician')->get();
        return view('dashboard.manager.assign',compact('services','technicians'));
  }

  public function assignCheckIn($request)
  {
        $request->validate([
            'technician_id'=>'required',
            'service_id'=>'required',
        ]);
        try{
        DB::beginTransaction();
        $check_in_id=session('assign_check_in_id');
        $client_technician = new ClientCheckInTechnician();
        $client_technician->client_check_in_id=$check_in_id;
        $client_technician->technician_id=$request->technician_id;
        $client_technician->service_id=$request->service_id;
        $client_technician->location_id=ClientCheckIn::find($check_in_id)->location_id;
        $client_technician->manager_id=Auth::user()->id;
        $client_technician->save();
        DB::commit();
        session()->forget('assign_check_in_id');
        return redirect()->route('manager.dashboard')->with('message','Check In Assigned Successfully');
        }catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}