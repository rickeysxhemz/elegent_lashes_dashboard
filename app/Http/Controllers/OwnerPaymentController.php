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

  
}
