<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TechnicianService;
use App\Http\Requests\TechnicianDashboard\LoginRequest;

class TechnicianController extends Controller
{
    public function __construct(TechnicianService $technicianService)
    {
        $this->technicianService = $technicianService;
    }
    public function loginPage()
    {
        return $this->technicianService->loginPage();
    }
    public function login(LoginRequest $request)
    {
        $request->validated();
        return $this->technicianService->login($request);
    }
    public function dashboard()
    {
        return $this->technicianService->dashboard();
    }

    public function logout()
    {
        return $this->technicianService->logout();
    }
    public function addPayments($id)
    {
        return $this->technicianService->addPayments($id);
    }
    public function addPaymentsStore(Request $request)
    {
        return $this->technicianService->addPaymentsStore($request);
    }
}
