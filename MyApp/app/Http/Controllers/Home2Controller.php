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




class Home2Controller extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();
        $has_topic = Student::where('student_id', $user->id)->first();
        $found = 0;
        $ads = array();
        $date = date('Y-m-d');

        if($has_topic->thesis_id)
        {
            $prof = Thesis::where('id', $has_topic->thesis_id)->first();
            $user = User::find($prof->id_prof);
            $ads = Ad::where('id_prof',$prof->id_prof)
                ->where('id_student', $user->id)
                ->where('finish_date', '>=', $date)
                ->orwhere('id_student', null)
                ->where('finish_date', '>=', $date)
                ->get();
            if(!$ads->isEmpty()){
                $found = 1;
            }
        }

        return view('student.home', compact('ads', 'user', 'found'));
    }


}


