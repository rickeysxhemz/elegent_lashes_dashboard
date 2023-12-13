<?php

namespace App\Repository;
use App\Models\Transaction;
use App\Models\Payment;
use App\Models\User;
use App\Models\Location;
use App\Models\Client;
class OwnerPaymentService{

    public function paymentPage()
    {
        $transactions = Transaction::with('transaction_details','technician','payment','client','location','service')
                                    ->orderBy('created_at','desc')
                                    ->get();
        // dd($transactions);
        return view('dashboard.owner.payment',compact('transactions'));
    }

    public function revenueCalculatorPage()
    {
       
        $locations = Location::all();
        $technicians = User::role('technician')->get();
        return view('dashboard.owner.revenue-calculator',compact('locations','technicians'));
    }

    public function revenueCalculate($request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
       
        
        $locations = Location::all();
        $technicians = User::role('technician')->get();

        if ($request->location_id) {
            $totals = Transaction::where('location_id', $request->location_id)
        ->whereBetween('created_at', [$request->start_date, $request->end_date]) // Assuming start_date and end_date are provided in the request
        ->with('payments')
        ->get()
        ->reduce(function ($carry, $transaction) {
            $carry['payment_amount'] += $transaction->payments->sum('payment_amount');
            $carry['tips'] += $transaction->payments->sum('tips');
            $carry['payment_total'] += $transaction->payments->sum('payment_total');
            return $carry;
        }, ['payment_amount'=>0,'tips' => 0, 'payment_total' => 0]);
        
        $transactions = Transaction::where('location_id', $request->location_id)
                        ->whereBetween('created_at', [$request->start_date, $request->end_date])
                        ->with('transaction_details','technician','payment','client','location','service')
                                    ->orderBy('created_at','desc')
                                    ->get();
                                    // dd($transactions);
        return view('dashboard.owner.revenue-calculator',compact('totals','transactions','locations','technicians'))->with('message', 'Revenue calculated successfully');                          
        }
        if ($request->payment_method) {
            $paymentMethod = $request->payment_method;
            $totals = Transaction::whereBetween('created_at', [$request->start_date, $request->end_date])
                        ->with(['payments' => function ($query) use ($paymentMethod) {
                            $query->where('payment_method', $paymentMethod);
                        }])
                    ->get()
                    ->reduce(function ($carry, $transaction) {
                        $carry['payment_amount'] += $transaction->payments->sum('payment_amount');
                        $carry['tips'] += $transaction->payments->sum('tips');
                        $carry['payment_total'] += $transaction->payments->sum('payment_total');
                        return $carry;
                    }, ['payment_amount' => 0, 'tips' => 0, 'payment_total' => 0]);
            
            $transactions = Transaction::whereBetween('created_at', [$request->start_date, $request->end_date])
                ->with('transaction_details', 'technician', 'payment', 'client', 'location', 'service')
                ->whereHas('payment',function ($query) use ($paymentMethod) {
                    $query->where('payment_method', $paymentMethod);
                })
                ->orderBy('created_at', 'desc')
                ->get();
                                        // dd($transactions);
                
            return view('dashboard.owner.revenue-calculator',compact('totals','transactions','locations','technicians'))->with('message', 'Revenue calculated successfully');   
        }
       if($request->technician_id)
       {
        $totals = Transaction::where('technician_id',$request->technician_id)
        ->whereBetween('created_at', [$request->start_date, $request->end_date]) // Assuming start_date and end_date are provided in the request
        ->with('payments')
        ->get()
        ->reduce(function ($carry, $transaction) {
            $carry['payment_amount'] += $transaction->payments->sum('payment_amount');
            $carry['tips'] += $transaction->payments->sum('tips');
            $carry['payment_total'] += $transaction->payments->sum('payment_total');
            return $carry;
        }, ['payment_amount'=>0,'tips' => 0, 'payment_total' => 0]);
        
        $transactions = Transaction::where('technician_id', $request->technician_id)
                        ->whereBetween('created_at', [$request->start_date, $request->end_date])
                        ->with('transaction_details','technician','payment','client','location','service')
                                    ->orderBy('created_at','desc')
                                    ->get();
                                   
                                   
        return view('dashboard.owner.revenue-calculator',compact('totals','transactions','locations','technicians'))->with('message', 'Revenue calculated successfully');   
       }         
        
    }

}