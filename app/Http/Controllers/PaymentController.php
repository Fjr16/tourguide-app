<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function transaction(Request $request, $id) {
        $item = Product::find(decrypt($id));
        $data = $request->all();
        $transaction = Transaction::create([
            'user_id' => auth()->user()->id,
            'product_id' => $item->id,
            'gross_amount' => $data['gross_amount'],
            'status' => 'pending',
        ]);

        // midtrans config
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverkey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $data['gross_amount'],
            ), 
            'customer_details' => array(
                'first_name' => Auth::user()->name ?? '',
                'email' => Auth::user()->email ?? '',
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        
        $transaction->snap_token = $snapToken;
        $transaction->save();

        return back()->with('snapToken', $snapToken);        
        // return redirect()->route('tourguide/checkout.payment', encrypt($transaction->id));        
    }

    public function payment($id) {
        $item = Transaction::find(decrypt($id));
        return view('pages.payment.payment', [
            'item' => $item,
            'title' => 'Payment'
        ]);
        // $item->update(['status' => 'success']);
        // return back()->with('success', 'Congratulation, Payment Successfully !!');        
    }
}
