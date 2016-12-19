<?php

namespace App\Http\Controllers;


use App\Professor;
use App\Student;
use App\Ad;
use App\Studentstopic;
use App\Thesis;
use App\User;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use Request;
use Validator;
use Illuminate\Session\Store;




class Home1Controller extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();

        $topics =  DB::table('theses')
            ->where('id_prof', $user->id)
            ->get();

        $students = DB::table('students')
            ->join('theses', 'theses.id', 'students.thesis_id')
            ->where('theses.id_prof', $user->id)
            ->get();

        $ads = DB::table('ads')
            ->where('id_prof', $user->id)
            ->get();

        return view('prof.home', compact('ads', 'topics', 'students'));
    }


}


