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
        if( \Auth::user()->role == 'admin' ) {return redirect('/home0');}
        if( \Auth::user()->role == 'prof' ) {return redirect('/home1');}
        if( \Auth::user()->role == 'student' ) {return redirect('/home2');}

        //return view('home');  // tu by mozna dawac 3 routes
    }
}
