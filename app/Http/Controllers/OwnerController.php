<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\OwnerService;
use App\Http\Requests\OwnerRequests\OwnerLoginRequest;
use App\Http\Requests\OwnerRequests\CreateManagerRequest;
use App\Http\Requests\OwnerRequests\UpdateManagerRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function __construct(OwnerService $ownerService)
    {
        $this->ownerService = $ownerService;
    }
    public function loginPage()
    {
        return $this->ownerService->loginPage();
    }
    public function login(OwnerLoginRequest $request)
    {
        $request->validated();
        return $this->ownerService->login($request);
    }

    public function logout()
    {
        return $this->ownerService->logout();
    }
    
    public function changePassword(Request $request)
    {
       
        $request->validate([
            'old_password' => 'required|min:8',
            'password' => 'required|confirmed|min:8',
        ]);
        $user = User::find(Auth::user()->id);
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Old password does not match');
        }
        else
        {
        $password = $this->ownerService->changePassword($request);
        if ($password) {
            return redirect()->route('owner.dashboard')->with('message', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    }

    public function changePasswordPage()
    {
        return $this->ownerService->changePasswordPage();
    }

    public function dashboard()
    {
        return $this->ownerService->dashboard();
    }
    public function manageManager()
    {
        return $this->ownerService->manageManager();
    }
    public function manageTechnician ()
    {
        return $this->ownerService->manageTechnician();
    }
    public function manageLocation()
    {
        return $this->ownerService->manageLocation();
    }

    public function createManagerPage()
    {
        return $this->ownerService->createManagerPage();
    }

    public function createManager(CreateManagerRequest $request)
    {
        $request->validated();
        $manager = $this->ownerService->createManager($request);
        if ($manager) {
            return redirect()->route('owner.manageManager')->with('message', 'Manager created successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    
    public Function editManagerPage($id)
    {
        return $this->ownerService->editManagerPage($id);
    }
    
    public function updateManager(Request $request, $id)
    {
        $request->validate([
            // 'full_name' => 'required|string',
            'email' => 'required|unique:users,email,' . $id,
            // 'phone' => 'required|numeric',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            // 'location' => 'required|string',

        ]);
        
        $manager = $this->ownerService->updateManager($request, $id);
        
        if ($manager) {
            return redirect()->route('owner.manageManager')->with('message', 'Manager updated successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function deleteManager($id)
    {
        $manager = $this->ownerService->deleteManager($id);
        if ($manager) {
            return redirect()->route('owner.manageManager')->with('message', 'Manager deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function createLocationPage()
    {
        return $this->ownerService->createLocationPage();
    }
    
    public function createLocation(Request $request)
    {
        $request->validate([
            'location_name' => 'required',
        ]);
        $location = $this->ownerService->createLocation($request);
        if ($location) {
            return redirect()->route('owner.manageLocation')->with('message', 'Location created successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    
    public function deleteLocation($id)
    {
        $location = $this->ownerService->deleteLocation($id);
        if ($location) {
            return redirect()->route('owner.manageLocation')->with('message', 'Location deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function createTechnicianPage()
    {
        return $this->ownerService->createTechnicianPage();
    }
    public function createTechnician(Request $request)
    {
        $technician = $this->ownerService->createTechnician($request);
        if ($technician) {
            return redirect()->route('owner.manageTechnician')->with('message', 'Technician created successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function editTechnicianPage($id)
    {
        return $this->ownerService->editTechnicianPage($id);
    }

    public function updateTechnician(Request $request, $id)
    {
        $request->validate([
            // 'full_name' => 'required|string',
            'email' => 'required|unique:users,email,' . $id,
            // 'phone' => 'required|numeric',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            // 'location' => 'required|string',

        ]);
        $technician = $this->ownerService->updateTechnician($request, $id);
        if ($technician) {
            return redirect()->route('owner.manageTechnician')->with('message', 'Technician updated successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function deleteTechnician($id)
    {
        $technician = $this->ownerService->deleteTechnician($id);
        if ($technician) {
            return redirect()->route('owner.manageTechnician')->with('message', 'Technician deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    
}
