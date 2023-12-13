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
use Carbon\Carbon;
use App\Models\ClientCheckIn;
use App\Models\Service;
class TechnicianService{

    public function dashboard()
    {
        $total_assigned_tasks = ClientCheckInTechnician::where('technician_id',Auth::user()->id)->count();
        $total_completed_tasks = ClientCheckInTechnician::where('technician_id',Auth::user()->id)->where('status','completed')->count();
        
        $totals = Transaction::where('technician_id', Auth::user()->id)
        ->with('payments')
        ->get()
        ->reduce(function ($carry, $transaction) {
            $carry['tips'] += $transaction->payments->sum('tips');
            $carry['payment_total'] += $transaction->payments->sum('payment_total');
            return $carry;
        }, ['tips' => 0, 'payment_total' => 0]);

        $total_tips = $totals['tips'];
        $total_payment = $totals['payment_total'];
        $user = Auth::user();
        $notifications_count = $user->unreadNotifications()->count();

        $technician_assigned_tasks = ClientCheckInTechnician::with('clientCheckIn.client_detail','manager')
        ->where('technician_id',Auth::user()->id)
        ->orderBy('created_at','desc')
        ->paginate(10);
       
   
        // dd($technician_assigned_tasks);
       $last_apointment = ClientCheckInTechnician::where('status','completed')
                          ->orderBy('created_at','desc')->pluck('created_at')->first();
      

        $checkIn = ClientCheckIn::where('client_id', Auth::user()->id)
                                ->whereHas('client_technician', function ($query) {
                                    $query->where('status', 'completed')
                                        ->latest('updated_at')
                                        ->limit(1);
                                })
                                ->orderBy('created_at', 'desc')
                                ->first();
       
        return view('dashboard.technician.index',compact('technician_assigned_tasks',
                                                        'total_assigned_tasks'
                                                        ,'total_completed_tasks',
                                                         'total_tips',
                                                        'total_payment',
                                                        'notifications_count',
                                                        'last_apointment'
                                                        ));
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
            return redirect()->back()->with('error', 'Invalid Email');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'You are logged out');
    }

    public function addPayments($id)
    {
        session(['client_check_in_id' => $id]);
        $services = Service::all();
        $client = ClientCheckInTechnician::with('clientCheckIn.client_detail')->where('client_check_in_id',$id)->first();
        $client_name = $client->clientCheckIn->client_detail->first_name.' '.$client->clientCheckIn->client_detail->last_name;
        
        $checkIn = ClientCheckIn::where('client_id', $client->clientCheckIn->client_detail->id)
                    ->whereHas('client_technician', function ($query) {
                        $query->where('status', 'completed')
                            ->latest('updated_at')
                            ->limit(1);
                    })
                    ->orderBy('created_at', 'desc')
                    ->first();
        if($checkIn){
            $last_appointment = Transaction::where('client_check_in_id', $checkIn->id)
                                ->with('payment')
                                ->get()->toArray();
                
            return view('dashboard.technician.add-payments',compact('client_name','last_appointment','checkIn','services'));
            }
                              
        return view('dashboard.technician.add-payments',compact('client_name','services'));
    }
    
    public function addPaymentsStore($request)
    {
        $request->validate([
            'amount' => 'required',
            'payment_method' => 'required',
            'tips' => 'max:255',
            'service_id' => 'required|exists:services,id',
            // 'note' => 'required',
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
        $transaction->client_check_in_id = $client_check_in_technician->client_check_in_id;
        $transaction->client_id = $client_check_in_technician->clientCheckIn->client_detail->id;
        $transaction->technician_id = $client_check_in_technician->technician->id;
        $transaction->location_id = $client_check_in_technician->location->id;
        $transaction->service_id = $request->service_id;
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

    public function listPayments()
    {
        $technician_assigned_tasks = ClientCheckInTechnician::with([
            'clientCheckIn.client_detail',
            'manager',
            'transaction' => function ($query) {
                $query->with('payments','transaction_details','service');
            }
            ]
        )
        ->where('technician_id',Auth::user()->id)
        ->where('status','completed')
        ->whereDate('updated_at',  Carbon::today()->toDateString())
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        return view('dashboard.technician.today-payment',compact('technician_assigned_tasks'));
    }

    public function editPaymentPage($id)
    {
        $transaction = Transaction::with('transaction_details','payment','client')
                        ->where('client_check_in_id',$id)
                        ->first();
        $services = Service::all();
        return view('dashboard.technician.edit-payment',compact('transaction','services'));
    }

    public function editPayment($request)
    {
        $request->validate([
            'client_check_in_id' => 'required|exists:client_check_ins,id',
            'amount' => 'required',
            'payment_method' => 'required',
            'tips' => 'max:255',
            // 'note' => 'max:255',
            'service_id' => 'required|exists:services,id',
        ]);
    
        try{
        DB::beginTransaction();
        $transaction = Transaction::with('transaction_details','payment','client')
                        ->where('client_check_in_id',$request->client_check_in_id)
                        ->first();
        $transaction->service_id = $request->service_id;
        $transaction->save();
        
        $detail_transaction = DetailTransaction::where('transaction_id',$transaction->id)->first();
        $detail_transaction->Note = $request->note;
        $detail_transaction->save();

        $payment = Payment::where('transaction_id',$transaction->id)->first();
        $payment->payment_method = $request->payment_method;
        $payment->payment_status = 'completed';
        $payment->payment_amount = $request->amount;
        $payment->tips = $request->tips;
        $payment->payment_total = $request->amount + $request->tips;
        $payment->save();
        DB::commit();

        return redirect()->route('technician.dashboard')->with('message', 'Payment updated successfully');

        }catch(Exception $e){
            DB::rollback();
            $error = "Error: Message: " . $e->getMessage() . " File: " . $e->getFile() . " Line #: " . $e->getLine();
            Helper::errorLogs("TechnicianService->editPayment()", $error);
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}