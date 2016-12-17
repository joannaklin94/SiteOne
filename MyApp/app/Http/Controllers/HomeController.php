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
        if( \Auth::user()->role_id == 1 ) {return redirect('/home0');}
        if( \Auth::user()->role_id == 2 ) {return redirect('/home1');}
        if( \Auth::user()->role_id == 3 ) {return redirect('/home2');}
    }
}
