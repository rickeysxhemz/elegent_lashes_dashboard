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
        $checkins = ClientCheckIn::with('client','manager','location')
                                        ->where('Client_id',$id)
                                        ->orderBy('created_at','desc')
                                        ->paginate(10);
        // dd($checkins);
        return view('dashboard.owner.expand-checkIn',compact('checkins'));
    }

    public function listWaivers()
    {
        $client_waivers = ClientWaiver::with('client','location')
                            ->orderBy('created_at','desc')
                            ->paginate(10);
        return view('dashboard.owner.waiver',compact('client_waivers'));
    }

    public function downloadWaiver($id)
    {
        $client_waiver = ClientWaiver::find($id);
        $pdfFileName = $client_waiver->waiver_storage_path;
        // $privatePdfPath = storage_path($pdfFileName);
        return response()->download(storage_path($pdfFileName));
    }

    public function updateClientPage($id)
    {
        $client = Client::where('id',$id)->first();
        return view('dashboard.owner.update-checkin',compact('client'));
    }

    public function updateClient($request,$id)
    {
        try{
        $client = Client::where('id',$id)->first();
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->save();
        return true;
        }catch(\Exception $e){
            return false;
        }
    }
}