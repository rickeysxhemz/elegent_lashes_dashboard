<?php

namespace App\Repository;
use App\Models\Transaction;
use App\Models\Payment;

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
}