<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\ClientCheckIn;
use App\Models\ClientWaiver;
use App\Models\LocationUser;
use App\Repository\Repository;
use Illuminate\Support\Str;
use App\Http\Requests\AuthRequests\UserRegisterRequest;

class UserController extends Controller
{
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function checkin()
    {
        return view('user.checkin')->with('message', 'Please enter your phone number to check in');
    }
    public function performCheckin(Request $request)
    {
        
        $validated = $request->only(['phone']);
        $request->validate([
            'phone' => 'required|numeric|digits:10|min:10',
        ]);

        $client = Client::where('phone', $request->phone)->first();
        $manager = LocationUser::with('location','manager')->where('user_id', auth()->user()->id)->first();
        
        if($client){
            $check_in=new ClientCheckIn();
            $check_in->manager_id=$manager->manager->id;
            $check_in->location_id=$manager->location->id;
            $check_in->client_id=$client->id;
            $check_in->save();
            $token=Str::random(60);
            session(['remember_token' => $token, 'client_id' => $client->id,'client_name'=>$client->first_name.' '.$client->last_name,'client_phone'=>$client->phone,'client_location'=>$manager->location->location]);
            return redirect()->route('user.waiver')->with('message', 'you are checked in successfully ');
            
        }else{
            session(['phone' => $request->phone]);
            return redirect()->route('user.registerPage')->with('error', 'you are not registered please register first');
            }
        
    }
    public function userRegisterPage()
    {
        return view('user.register')->with('message', 'Please enter your details to register');
    }

    public function userRegister(UserRegisterRequest $request)
    {
        $validated = $request->validated();
        $create_client = $this->repository->createClient($request);

            if(!$create_client)
                return redirect()->back()->with('error', 'Something went wrong');
            return redirect()->route('user.waiver')->with('message', 'you are checked in successfully ');
    }
    public function dashboard()
    {
        if(!session('remember_token')){
            return redirect()->route('user.checkin')->with('error', 'Your token expired, please check in again');
        }

        $check_ins = ClientCheckIn::where('client_id', session('client_id'))
        ->orderBy('created_at', 'desc')
        ->take(10) // Limit the result to 10 records
        ->pluck('created_at')
        ->map(function ($timestamp) {
            return $timestamp->format('F j, Y \a\t g:i A');
        })
        ->toArray();
        
        $waiver_signed_date=ClientWaiver::where('client_id', session('client_id'))->pluck('created_at')->first()->format('F j, Y \a\t g:i A');
        
        return view('user.dashboard',compact('check_ins', 'waiver_signed_date'))->with('message',session('client_name') .'you are checked in successfully ');
        
    }
    public function waiver()
    {
        if(!session('remember_token')){
            return redirect()->route('user.checkin')->with('error', 'Your token expired, please check in again');
        }
      
        $waiver = ClientWaiver::where('client_id', session('client_id'))
        ->whereDate('created_at', now()->toDateString())
        ->first();
        
        if($waiver){

            return redirect()->route('user.dashboard')->with('message', session('client_name').', you are checked in successfully ');
        }
        else{
        return view('user.waiver')->with('message',''.session('client_name') .'please sign this document to view your dashboard ');
    }

    }
    public function generateSignedWaiver(Request $request)
    {
        if(!session('remember_token')){
            return redirect()->route('user.checkin')->with('error', 'Your token expired, please check in again');
        }
        $waiver_upload = $this->repository->generateSignedPDF($request);
        if(!$waiver_upload)
        dd($request->all());
            return redirect()->back()->with('error', 'Something went wrong');
        return redirect()->route('user.dashboard')->with('message', 'Waiver uploaded successfully');
    }
    
    public function logout()
    {
        session()->forget(['remember_token', 'client_id', 'client_name', 'client_phone']);
        return redirect()->route('user.checkin')->with('message', 'You are logged out,thank you for visiting us');
    }
}
