<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $from_checkout = session('from_checkout');
        if(!empty($from_checkout)) {            
            return redirect('/checkout/confirm');
        } else {
            return view('home');
        }        
    }
}
