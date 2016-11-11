<?php

namespace App\Http\Controllers;


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




class Prof_topicsController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $topics = DB::table('theses')
            ->where('id_prof', $user->id)
            ->get();

        return view('prof.prof_topics', compact('topics', 'user'));
    }

    public function create()
    {
        return view('prof.create_topic');
    }


    public function store(Request $request)
    {
        $id_user = Auth::user()->id;

        $input = $request->all();

        $specialisations_string = implode(';', $input['specialisations']);
        $input['specialisations']=$specialisations_string;

        $this->validator($input)->validate();
        $input['id_prof'] = $id_user;


        Thesis::create($input);


//        $request->session()->flash('message', 'You successfully added new topic!!');

        return redirect("prof_topics");
    }


    public function restore($id, Request $request)
    {
        $id_user = Auth::user()->id;

        $input = $request->all();

        $specialisations_string = implode(';', $input['specialisations']);
        $input['specialisations']=$specialisations_string;

        $this->validator($input)->validate();
        $input['id_prof'] = $id_user;

        $topic = Thesis::find($id);

            $topic->title = $input['title'];
            $topic->description = $input['description'];
            $topic->degree = $input['degree'];
            $topic->specialisations = $input['specialisations'];
            $topic->save();


//        $request->session()->flash('message', 'You successfully added new topic!!');

        return redirect("prof_topics");
    }


    public function edit($id)
    {
        $topic = Thesis::findOrFail($id);

        return view('prof.edit_topic',compact('topic'));
    }

    public function delete($id)
    {

        DB::table('theses')->where('id', '=', $id)->delete();

        return redirect("prof_topics");
    }

    public function show($id)
    {

        $topic = Thesis::findOrFail($id);

        $specialisations_array = explode( ';', $topic->specialisations );

        return view('prof.topic', compact('topic', 'specialisations_array'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' =>  'required',
            'specialisations' =>  'required|max:255',
        ]);
    }

}


