<?php

namespace App\Repository;
use App\Models\ClientCheckIn;
use App\Models\Client;
use App\Models\ClientWaiver;

class OwnerCheckInService 
{
    public function listCheckins()
    {
        $clients = Client::paginate(10);
        // dd($checkins);
        return view('dashboard.owner.checkIn',compact('clients'));
    }
    
    public function listCheckinsByUser($id)
    {
        $checkins = ClientCheckIn::with('client','manager','location')->where('Client_id',$id)->paginate(10);
        // dd($checkins);
        return view('dashboard.owner.expand-checkIn',compact('checkins'));
    }

    public function listWaivers()
    {
        $client_waivers = ClientWaiver::with('client','location')->paginate(10);
        return view('dashboard.owner.waiver',compact('client_waivers'));
    }
}