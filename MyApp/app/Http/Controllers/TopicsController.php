<?php

namespace App\Http\Controllers;


use App\Student;
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

class TopicsController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $topics = Thesis::where('is_chosen', '=', 'not_chosen')->get();

        foreach ($topics as $topic){

            $prof_id = $topic->id_prof;
            $prof = User::find($prof_id);

            $topic['name'] = $prof->name;
            $topic['surname'] = $prof->surname;
        }

        return view('before_auth.topics', compact('topics'));
    }

    public function show($id)
    {
        $topic = Thesis::findOrFail($id);
        $array = explode( ';', $topic->specialisations );
        $specialisations_array=array();

        for ($i=0; $i<count($array); $i++)
        {
            $result = DB::table('specialisations')
                ->where('specialisation_id', $array[$i])
                ->first();

            array_push($specialisations_array, $result->specialisation_name);
        }

        return view('before_auth.topic', compact('topic', 'specialisations_array'));
    }

}


