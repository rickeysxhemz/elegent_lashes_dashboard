<?php

namespace App\Repository;
use App\Models\Transaction;
use App\Models\Payment;
use App\Models\User;

class OwnerPaymentService{

    public function paymentPage()
    {
        $transactions = Transaction::with('transaction_details','technician','payment','client','location','service')->get();
        // dd($transactions);
        return view('dashboard.owner.payment',compact('transactions'));
    }

    public function revenueCalculatorPage()
    {
        $totalPayment = Payment::sum('payment_total');
        return view('dashboard.owner.revenue-calculator',compact('totalPayment'));
    }

    public function revenueCalculate($request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);
       
        $endDate = $request->input('end_date', null);
        
        if ($endDate) {

            // If both start_date and end_date are provided, calculate earnings between the specified dates
            $totalPaymentCalculated = Payment::whereBetween('created_at', [$request->start_date, $endDate])->sum('payment_total');
            
        } else {
            // If only start_date is provided, calculate earnings for that single day
            $totalPaymentCalculated = Payment::whereDate('created_at', $request->start_date)->sum('payment_total');
        
        }
                
        return view('dashboard.owner.revenue-calculator',compact('totalPaymentCalculated'))->with('message', 'Revenue calculated successfully');
    }

    public function technicianPayment()
    {
        $transactions = Transaction::with('transaction_details','technician','payment','client','location','service')->get();
        // dd($transactions);
        $technicians=User::role('technician')->get();
        
        return view('dashboard.owner.technician-payments',compact('transactions','technicians'));
    }

    public function technicianRevenueCalculate($request)
    {
        $totals = Transaction::where('technician_id', $request->technician_id)
        ->whereBetween('created_at', [$request->start_date, $request->end_date]) // Assuming start_date and end_date are provided in the request
        ->with('payments')
        ->get()
        ->reduce(function ($carry, $transaction) {
            $carry['tips'] += $transaction->payments->sum('tips');
            $carry['payment_total'] += $transaction->payments->sum('payment_total');
            return $carry;
        }, ['tips' => 0, 'payment_total' => 0]);
        $technicians = User::role('technician')->get();
        $transactions = Transaction::with('transaction_details','technician','payment','client','location','service')->get();

    return view('dashboard.owner.technician-payments',compact('totals','technicians','transactions'))->with('message', 'Revenue calculated successfully');
    }
}