<?php
namespace App\Repository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helper\Helper;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\ClientCheckInTechnician;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\Payment;

class TechnicianService{
    public function dashboard()
    {
        $technician_assigned_tasks = ClientCheckInTechnician::with('clientCheckIn.client_detail')
        ->where('technician_id',Auth::user()->id)
        // ->where('status','pending')
        ->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END, status")
        ->paginate(10);
        // dd($technician_assigned_tasks);
        return view('dashboard.technician.index',compact('technician_assigned_tasks'));
    }
    public function loginPage()
    {
        return view('dashboard.technician.signin-one');
    }
    public function login($request)
    {
        $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if ($user->hasRole('technician')) {
                    Auth::login($user);
                    return redirect()->route('technician.dashboard')->with('message', 'You are logged in');
                } else {
                    return redirect()->back()->with('error', 'You are not authorized to login');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid password');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid phone number');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('dashboard')->with('message', 'You are logged out');
    }

    public function addPayments($id)
    {
        session(['client_check_in_id' => $id]);
        $client = ClientCheckInTechnician::with('clientCheckIn.client_detail')->where('client_check_in_id',$id)->first();
        $client_name = $client->clientCheckIn->client_detail->first_name.' '.$client->clientCheckIn->client_detail->last_name;
        
        return view('dashboard.technician.add-payments',compact('client_name'));
    }
    public function addPaymentsStore($request)
    {
        $request->validate([
            'amount' => 'required',
            'payment_method' => 'required',
            'tips' => 'max:255',
        ]);
        try{
        $client_check_in_id = session('client_check_in_id');
        
        DB::beginTransaction();
        $client_check_in_technician = ClientCheckInTechnician::with(
                                    'clientCheckIn.client_detail',
                                    'technician',
                                    'service',
                                    'location',
                                    'manager')
                                    ->where('client_check_in_id',$client_check_in_id)
                                    ->first();
        
        $client_check_in_technician->status = 'completed';
        $client_check_in_technician->save();

        $transaction = new Transaction();
        $transaction->client_id = $client_check_in_technician->clientCheckIn->client_detail->id;
        $transaction->technician_id = $client_check_in_technician->technician->id;
        $transaction->location_id = $client_check_in_technician->location->id;
        $transaction->service_id = $client_check_in_technician->service->id;
        $transaction->service_id = $client_check_in_technician->manager->id;//manager id
        $transaction->status = 1;
        $transaction->save();

        $detail_transaction = new DetailTransaction();
        $detail_transaction->transaction_id = $transaction->id;
        $detail_transaction->Note = $request->note;
        $detail_transaction->save();

        $payment = new Payment();
        $payment->transaction_id = $transaction->id;
        $payment->payment_method = $request->payment_method;
        $payment->payment_status = 'completed';
        $payment->payment_amount = $request->amount;
        $payment->tips = $request->tips;
        $payment->payment_total = $request->amount + $request->tips;
        $payment->save();
        DB::commit();

        session()->forget('client_check_in_id');

        return redirect()->route('technician.dashboard')->with('message', 'Payment added successfully');

        }catch(Exception $e){
            DB::rollback();
            $error = "Error: Message: " . $e->getMessage() . " File: " . $e->getFile() . " Line #: " . $e->getLine();
            Helper::errorLogs("TechnicianService->addPaymentsStore()", $error);
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}