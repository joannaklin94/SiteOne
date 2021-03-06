<?php

namespace App\Http\Controllers;


use App\Ad;
use App\Student;
use App\Professor;
use App\User;
use App\Thesis;
use Illuminate\Support\Facades\Input;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use Request;
use Validator;
use Illuminate\Session\Store;

class Prof_adsController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $ads = DB::table('ads')
            ->where('id_prof', $user->id)
            ->get();

        return view('prof.prof_ads', compact('ads','user'));
    }

    public function create()
    {

        return view('prof.create_ad');
    }

    public function ajax()
    {
//        $to_who = Input::get('to_who');

        $user = Auth::user();


        $students = DB::table('users')
            ->join('students', 'students.student_id', 'users.id')
            ->join('theses', 'students.thesis_id', 'theses.id')
            ->select('users.name', 'users.surname', 'users.id')
            ->where('id_prof', $user->id)
            ->get();


        return response()->json($students);
    }

    public function restore($id, Request $request)
    {
        $id_user = Auth::user()->id;

        $input = $request->all();
        $this->validator($input)->validate();
        $input['id_prof'] = $id_user;

        $ad = Ad::find($id);

        $ad->title = $input['title'];
        $ad->description = $input['description'];
        $ad->finish_date = $input['finish_date'];
        $ad->save();

        return redirect('prof_ads');
    }


//    public function store(Request $request)
//    {
//        $id = Auth::user()->id;
//
//        $input = $request->all();
//        $this->validator($input)->validate();
//        $input['id_prof'] = $id;
//
//        Ad::create($input);
//
////        $request->session()->flash('message', 'You successfully added new topic!!');
//
//        return redirect("prof_ads");
//    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $this->validator($input)->validate();

        $input['id_prof'] = $user->id;
        if($input['students'] == 0){
            $input['students'] = null;
        }

        if($input['old_ad'])
        {
            $ad = Ad::find($input['old_ad']);

            $ad->id_prof=$user->id;
            $ad->title = $input['title'];
            $ad->description = $input['description'];
            $ad->id_student = $input['students'];
            $ad->finish_date = $input['finish_date'];
            $ad->save();
        }


        else
        {
            Ad::create($input);
        }


        return redirect("prof_ads");
    }

    public function edit($id)
    {
        $old_ad = Ad::find($id);

        return view('prof.create_ad', compact('old_ad'));
    }

    public function delete($id)
    {

        DB::table('ads')->where('id', '=', $id)->delete();

        return redirect("prof_ads");
    }

    public function show($id)
    {

        $ad = Ad::findOrFail($id);


        return view('prof.ad', compact('ad'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' =>  'required',
            'description' =>  'required',
            'finish_date' =>  'required',
        ]);
    }


}


