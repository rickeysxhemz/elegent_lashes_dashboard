<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ManagerDashboardService;
use App\Http\Requests\ManagerDashboard\LoginRequest;

class ManagerDashboardController extends Controller
{
    public function __construct(ManagerDashboardService $managerDashboardService)
    {
        $this->managerDashboardService = $managerDashboardService;
    }

   public function loginPage()
   {
       return $this->managerDashboardService->loginPage();
   }

   public function login(LoginRequest $request)
   {
       $request->validated();
       return $this->managerDashboardService->login($request);
   }

   public function dashboard()
    {
         return $this->managerDashboardService->dashboard();
    }

    public function logout()
    {
        return $this->managerDashboardService->logout();
    }

    public function assignCheckInPage($id)
    {
        return $this->managerDashboardService->assignCheckInPage($id);
    }

    public function assignCheckIn(Request $request)
    {
        return $this->managerDashboardService->assignCheckIn($request);
    }

    public function listCheckins()
    {
        return $this->managerDashboardService->listCheckins();
    }

    public function assignedCheckins()
    {
        return $this->managerDashboardService->assignedCheckins();
    }

    public function updateAssignedCheckins($id)
    {
        return $this->managerDashboardService->updateAssignedCheckins($id);
    }

    public function updateAssignedCheckinsTask(Request $request)
    {
        return $this->managerDashboardService->updateAssignedCheckinsTask($request);
    }
}
