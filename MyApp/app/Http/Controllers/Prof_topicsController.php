<?php

namespace App\Http\Controllers;



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
            ->latest()
            ->get();

        return view('prof.prof_topics', compact('topics', 'user'));
    }

    public function create()
    {
        $faculties = DB::table('faculties')
            ->get();
        $old_topic = null;

        return view('prof.create_topic', compact('faculties', 'old_topic'));
    }

    public function edit($id)
    {
        $old_topic = Thesis::find($id);
        $faculties = DB::table('faculties')
            ->get();

        return view('prof.create_topic', compact('faculties', 'old_topic'));
    }

    public function ajax()
    {
        $faculty_id = Input::get('faculty_id');

        $specialisations = DB::table('specialisations')
            ->where('faculty_id', $faculty_id)
            ->get();

        return response()->json($specialisations);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $this->validator($input)->validate();
//
        $specialisations_string = implode(';', $input['specialisations']);
        $input['specialisations']=$specialisations_string;
        $input['id_prof']=$user->id;

        if($input['old_topic'])
            {
                $topic = Thesis::find($input['old_topic']);

                $topic->id_prof=$user->id;
                $topic->title_pol = $input['title_pol'];
                $topic->title_ang = $input['title_ang'];
                $topic->description_pol = $input['description_pol'];
                $topic->description_ang = $input['description_ang'];
                $topic->faculties = $input['faculties'];
                $topic->degree = $input['degree'];
                $topic->specialisations = $input['specialisations'];
                $topic->save();
            }

        else
            {
                Thesis::create($input);
            }

        return redirect("prof_topics");
    }

    public function delete($id)
    {
        $thesis = DB::table('theses')->where('id', '=', $id)->first();

        if($thesis->is_chosen == 'not_chosen')
        {
            DB::table('theses')->where('id', '=', $id)->delete();
        }

        return redirect("prof_topics");
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

        return view('prof.topic', compact('topic', 'specialisations_array'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title_pol' =>  'required',
            'title_ang' =>  'required',
            'specialisations' =>  'required|max:255',
        ]);
    }

}


