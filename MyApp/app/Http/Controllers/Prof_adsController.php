<?php

namespace App\Http\Controllers;


use App\Ad;
use App\Student;
use App\Professor;
use App\User;
use App\Thesis;
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


    public function store(Request $request)
    {
        $id = Auth::user()->id;

        $input = $request->all();
        $this->validator($input)->validate();
        $input['id_prof'] = $id;

        Ad::create($input);

//        $request->session()->flash('message', 'You successfully added new topic!!');

        return redirect("prof_ads");
    }

    public function edit($id)
    {
        $ad = Ad::find($id);

        return view('prof.edit_ad', compact('ad'));
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


