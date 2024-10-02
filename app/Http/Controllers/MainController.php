<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('pages.main.index', [
            'title' => 'Dashboard',
        ]);
    }
    public function about(){
        return view('pages.main.about', [
            'title' => 'About',
        ]);
    }
    public function contactUs(){
        return view('pages.main.contact', [
            'title' => 'Contact',
        ]);
    }
}
