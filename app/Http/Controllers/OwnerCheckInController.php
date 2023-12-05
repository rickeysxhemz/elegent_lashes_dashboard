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
    public function downloadWaiver($id)
    {
        return $this->ownerCheckInService->downloadWaiver($id);
    }

    public function updateClientPage($id)
    {
        return $this->ownerCheckInService->updateClientPage($id);
    }

    public function updateClient(Request $request,$id)
    {
        $update_client = $this->ownerCheckInService->updateClient($request,$id);
        if($update_client){
            return redirect()->route('owner.listCheckins')->with('message','Client Updated Successfully');
        }else{
            return redirect()->route('owner.listCheckins')->with('error','Client Not Updated');
        }
    }

}
