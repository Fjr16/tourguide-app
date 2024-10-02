<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // checkout page
    public function index() {
        return view('pages.payment.index', [
            'title' => 'Checkout',
            // 'title' => 'Checkout',
        ]);        
    }
}
