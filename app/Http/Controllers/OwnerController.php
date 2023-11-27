<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\OwnerService;
use App\Http\Requests\OwnerRequests\OwnerLoginRequest;

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
    public function dashboard()
    {
        return $this->ownerService->dashboard();
    }
}
