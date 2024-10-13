<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('pages.main.index2', [
            'title' => 'Dashboard',
        ]);
    }
    public function about(){
        return view('pages.main.about', [
            'title' => 'About',
        ]);
    }
}
