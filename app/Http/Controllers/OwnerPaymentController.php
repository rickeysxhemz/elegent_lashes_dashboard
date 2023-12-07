<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\OwnerPaymentService;

class OwnerPaymentController extends Controller
{
    public function __construct(OwnerPaymentService $ownerPaymentService)
    {
        $this->ownerPaymentService = $ownerPaymentService;
    }

    public function paymentPage()
    {
        return $this->ownerPaymentService->paymentPage();
    }

    public function revenueCalculatorPage()
    {
        return $this->ownerPaymentService->revenueCalculatorPage();
    }

    public function revenueCalculate(Request $request)
    {
        return $this->ownerPaymentService->revenueCalculate($request);
    }

    public function technicianPayment()
    {
        return $this->ownerPaymentService->technicianPayment();
    }

    public function technicianRevenueCalculate(Request $request)
    {
        $request->validate([
            'technician_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        return $this->ownerPaymentService->technicianRevenueCalculate($request);
    }
}
