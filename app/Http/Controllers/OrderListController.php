<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    public function index(){
        if (auth()->user()->role === 'ADMIN') {
            $data = Transaction::get();
        }else{
            $data = Transaction::where('user_id', auth()->user()->id)->get();
        }
        return view('pages.order.index', [
            'title' => 'Order List',
            'data' => $data,
        ]);
    }
}
