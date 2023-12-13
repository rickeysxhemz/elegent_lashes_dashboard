<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class TrackCheckInController extends Controller
{
    public function trackCheckIn()
    {
       $tracks = Client::with(['latestCheckIn' => function ($query) {
            $query->latest('created_at');
        }])->get()->toArray();
        
        return view('dashboard.track.track-checkin',compact('tracks'));
    }

}
