<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\OwnerCheckInService;

class OwnerCheckInController extends Controller
{
    public function __construct(OwnerCheckInService $ownerCheckInService)
    {
        $this->ownerCheckInService = $ownerCheckInService;
    }
    public function listCheckins()
    {
        return $this->ownerCheckInService->listCheckins();
    }
    public function listCheckinsByUser($id)
    {
        return $this->ownerCheckInService->listCheckinsByUser($id);
    }

    public function listWaivers()
    {
        return $this->ownerCheckInService->listWaivers();
    }

}
