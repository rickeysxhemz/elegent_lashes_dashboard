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
use App\Jobs\SendNotification;

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
            $assigned  = ClientCheckInTechnician::where('location_id',$user->location_id)->where('manager_id',Auth::user()->id)->count();
            
            $not_assigned = ClientCheckIn::with('client')
                            ->where('location_id',$user->location_id)
                            ->where('manager_id',Auth::user()->id)
                            ->whereDoesntHave('client_technician', function ($query) {
                                $query->where('client_check_in_id', DB::raw('client_check_ins.id'));
                            })
                            ->orderBy('created_at','desc')
                            ->count();
            $completed = ClientCheckInTechnician::where('location_id',$user->location_id)->where('manager_id',Auth::user()->id)->where('status','completed')->count();
            
            $check_ins = ClientCheckIn::with('client')
                        ->where('location_id',$user->location_id)
                        ->where('manager_id',Auth::user()->id)
                        ->where('created_at', '>=',now()->toDateString())
                       
                        ->whereDoesntHave('client_technician', function ($query) {
                            $query->where('client_check_in_id', DB::raw('client_check_ins.id'));
                        })
                        ->orderBy('created_at','desc')
                        ->paginate(10);
            
            return view ('dashboard.manager.index',compact('check_in_count','assigned','not_assigned','completed','check_ins'));
        }
        else{
         return view('dashboard.manager.blank');}
  }
  public function logout()
  {
        Auth::logout();
        return redirect()->route('dashboard')->with('message','You are logged out');
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
        SendNotification::dispatch('You have been assigned a check in', $request->technician_id);
        return redirect()->route('manager.dashboard')->with('message','Check In Assigned Successfully');
        }catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function listCheckins()
    {
        $user =LocationUser::where('user_id',Auth::user()->id)->first();
        $check_ins = ClientCheckIn::with('client')
        ->where('location_id',$user->location_id)
        ->where('manager_id',Auth::user()->id)
        ->where('created_at', '<',now()->toDateString())
       
        ->whereDoesntHave('client_technician', function ($query) {
            $query->where('client_check_in_id', DB::raw('client_check_ins.id'));
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        return view('dashboard.manager.historical-checkins',compact('check_ins'));
    }

    public function assignedCheckins()
    {
        $user =LocationUser::where('user_id',Auth::user()->id)->first();
        $check_ins = ClientCheckInTechnician::with('clientCheckIn.client_detail','technician','service','location','manager')
        ->where('location_id',$user->location_id)
        ->where('manager_id',Auth::user()->id)
        ->where('status','pending')
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        return view('dashboard.manager.assigned-checkins',compact('check_ins'));
    }

    public function updateAssignedCheckins($id)
    {
        $assigned_task = ClientCheckInTechnician::with('technician')->where('id',$id) ->first();
        $technicians = User::role('technician')->get();
        $services = Service::all();

        return view('dashboard.manager.update-assigned-checkin',compact('assigned_task','technicians','services'));
    }

    public function updateAssignedCheckinsTask($request)
    {
        $request->validate([
            'technician_id'=>'required',
            'service_id'=>'required',
        ]);
        try{
        DB::beginTransaction();
        $client_technician = ClientCheckInTechnician::find($request->id);
        $client_technician->technician_id=$request->technician_id;
        $client_technician->service_id=$request->service_id;
        $client_technician->save();
        DB::commit();
        
        if($request->technician_id == $client_technician->technician_id){
            SendNotification::dispatch('You have been assigned a check in', $request->technician_id);
        }
        return redirect()->route('manager.assignedCheckins')->with('message','Check In Assigned Successfully');
        }catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function listCompleted()
    {
        $user =LocationUser::where('user_id',Auth::user()->id)->first();
        $check_ins = ClientCheckInTechnician::with('clientCheckIn.client_detail','technician','service','location','manager')
        ->where('location_id',$user->location_id)
        ->where('manager_id',Auth::user()->id)
        ->where('status','completed')
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        return view('dashboard.manager.list-checkins',compact('check_ins'));
    }
}