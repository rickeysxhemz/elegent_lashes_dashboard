<?php

namespace App\Repository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helper\Helper;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\LocationUser;
use App\Models\Location;
use App\Models\LocationTechnician;
use Illuminate\Http\Request;
use App\Models\ClientCheckInTechnician;
use App\Models\Payment;
use App\Models\Client;
use App\Models\ClientWaiver;
use App\Models\ClientCheckIn;

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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('dashboard')->with('message', 'You are logged out');
    }

    public function changePasswordPage()
    {
        return view('dashboard.owner.change-password');
    }
    
    public function changePassword($request)
    {
        try{
            DB::beginTransaction();
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            DB::commit();
            return true;
        }catch(Excetion $e){
            DB::rollback();
            Helper::errorLogs("OwnerService->ChangePassword()", $error);
            return false;
        }
    }

    public function dashboard()
    {
        $total_Task = ClientCheckInTechnician::count();
        $total_services_Done = ClientCheckInTechnician::where('status','completed')->count();
        $total_Task_Assigned = ClientCheckInTechnician::where('status','pending')->count();
        $total_clients = Client::count();
        $progress = ($total_services_Done/$total_Task)*100;
        $progress = ceil($progress);
        $total_earning = Payment::sum('payment_amount');
        $total_tips = Payment::sum('tips');
        $grand_total = $total_earning + $total_tips;
        $waivers = ClientWaiver::count();
        $today_check_ins = ClientCheckIn::whereDate('created_at', DB::raw('CURDATE()'))
        ->with('client', 'location')
        ->get();
        $technicians = User::with(['roles','technician_locations.location'])->whereHas('roles', function ($query) {
            $query->where('name', 'technician');
        })->get();
        // dd($technicians);
        $client_waivers = ClientWaiver::with('client')
                        ->latest()
                        ->take(5) 
                        ->get();
        return view('dashboard.owner.index',compact('total_Task',
                                                    'total_services_Done',
                                                    'total_Task_Assigned',
                                                    'progress',
                                                    'total_earning',
                                                    'total_tips',
                                                    'grand_total',
                                                    'total_clients',
                                                    'waivers',
                                                    'today_check_ins',
                                                    'technicians',
                                                    'client_waivers'
                                                ));
    }

    public function manageManager()
    {
        $managers = User::with(['roles','locations'=>function($query){
            $query->with('location');
        }])->whereHas('roles', function ($query) {
            $query->where('name', 'manager');
        })->paginate(10);
        // dd($managers);
        
        return view('dashboard.owner.manager', compact('managers'));
    }
    public function manageTechnician()
    {
        $technicians = User::with(['roles','technician_locations'])->whereHas('roles', function ($query) {
            $query->where('name', 'technician');
        })->paginate(10);
        
        return view('dashboard.owner.technician',compact('technicians'));
    }

    public function manageLocation()
    {
        $locations = Location::paginate(10);
        return view('dashboard.owner.location',compact('locations'));
    }

    public function createManagerPage()
    {
        $locations= Location::all();
        return view('dashboard.owner.create-manager',compact('locations'));
    }

    public function createManager($request)
    {
        try{
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->full_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();
            $user_role = Role::findByName('manager');
            $user_role->users()->attach($user->id);
            $manager_location = new LocationUser();
            $manager_location->user_id = $user->id;
            $manager_location->location_id = $request->location;
            $manager_location->save();
            DB::commit();
            return true;
        }catch(Excetion $e){
            DB::rollback();
            Helper::errorLogs("OwnerService->CreateManager()", $error);
            return false;
        }

    }
    public function editManagerPage($id)
    {
        $manager = User::with(['roles','locations'])->whereHas('roles', function ($query) {
            $query->where('name', 'manager');
        })->where('id',$id)->first();
        $locations= Location::all();
        return view('dashboard.owner.update-manager',compact('manager','locations'));
    }
    public function updateManager($request, $id)
    {
        try{
            DB::beginTransaction();
            $user = User::find($id);
            $user->name = $request->full_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->save();
            $manager_location = LocationUser::where('user_id',$id)->first();
            $manager_location->location_id = $request->location;
            $manager_location->save();
            DB::commit();
            return true;
        }catch(Excetion $e){
            DB::rollback();
            Helper::errorLogs("OwnerService->CreateManager()", $error);
            return false;
        }
    }
    
    public function deleteManager($id)
    {
        try{
            DB::beginTransaction();
            $user = User::find($id);
            $user->removeRole('manager');
            $user->delete();
            DB::commit();
            return true;
        }catch(Excetion $e){
            DB::rollback();
            Helper::errorLogs("OwnerService->DeleteManager()", $error);
            return false;
        }
    }

    public function createLocationPage()
    {
        return view('dashboard.owner.create-location');
    }

    public function createLocation($request)
    {
        try{
            DB::beginTransaction();
            $location = new Location();
            $location->name = $request->location_name;
            $location->address = $request->address;
            $location->city = $request->city;
            $location->state = $request->state;
            $location->zip = $request->zip;
            $location->save();
            DB::commit();
            return true;

        }
        catch(Exception $e)
        {
            DB::rollback();
            Helper::errorLogs("OwnerService->CreateLocation()", $error);
            return false;
        }
    }

    public function deleteLocation($id)
    {
        try{
            DB::beginTransaction();
            $location = Location::find($id);
            $location->delete();
            DB::commit();
            return true;
        }
        catch(Exception $e)
        {
            DB::rollback();
            Helper::errorLogs("OwnerService->DeleteLocation()", $error);
            return false;
        }
    }

    public function createTechnicianPage()
    {
        $locations= Location::all();
        return view('dashboard.owner.create-technician',compact('locations'));
    }

    public function createTechnician($request)
    {
        try{
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->full_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();
            $user_role = Role::findByName('technician');
            $user_role->users()->attach($user->id);
            $technician_location = new LocationTechnician();
            $technician_location->user_id = $user->id;
            $technician_location->location_id = $request->location;
            $technician_location->save();
            DB::commit();
            return true;
        }catch(Excetion $e){
            DB::rollback();
            Helper::errorLogs("OwnerService->CreateTechnician()", $error);
            return false;
        }
    }

    public function editTechnicianPage($id)
    {
        $technician = User::with(['roles'])->whereHas('roles', function ($query) {
            $query->where('name', 'technician');
        })->where('id',$id)->first();
        $locations= Location::all();
        return view('dashboard.owner.update-technician',compact('technician','locations'));
    }

    public function updateTechnician($request, $id)
    {
        try{
            DB::beginTransaction();
            $user = User::find($id);
            $user->name = $request->full_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->save();
            $technician_location = LocationTechnician::where('user_id',$id)->first();
            $technician_location->location_id = $request->location;
            $technician_location->save();
            DB::commit();
            return true;
        }catch(Excetion $e){
            DB::rollback();
            Helper::errorLogs("OwnerService->UpdateTechnician()", $error);
            return false;
        }
    }

    public function deleteTechnician($id)
    {
        try{
            DB::beginTransaction();
            $user = User::find($id);
            $user->removeRole('technician');
            $user->delete();
            DB::commit();
            return true;
        }catch(Excetion $e){
            DB::rollback();
            Helper::errorLogs("OwnerService->DeleteTechnician()", $error);
            return false;
        }
    }
    
}