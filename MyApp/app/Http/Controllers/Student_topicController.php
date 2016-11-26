<?php

namespace App\Http\Controllers;


use App\Professor;
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




class Student_topicController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit()
    {
        $user = Auth::user();
        $student = Student::find($user->id);
        $student_spec = $student->specialisation;

        $topics = Thesis::where('is_chosen', 'not_chosen')
            ->where('degree', $student->degree)
            ->get();
        $found = 0;

        foreach ($topics as $topic){

            $specialisations_for_topic = $topic->specialisations;
            $array = explode(';', $specialisations_for_topic);

            if ( in_array($student_spec, $array)){

                $prof_id = $topic->id_prof;
                $prof = User::find($prof_id);

                $topic['name'] = $prof->name;
                $topic['surname'] = $prof->surname;
                $topic['flag'] =  1;  //topic adequate for student
                $found = 1;
            }

            else {
                $topic['flag'] =  0;
            }

        }

        return view('student.edit_topic', compact('topics', 'student', 'found'));
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $this->validator($input)->validate();

        $studentstopic = Studentstopic::where('id_student', '=', $user->id)->first();


        if ($studentstopic!=null){

            $topic = Thesis::find($studentstopic->id_thesis);
            $topic->is_chosen = 'not_chosen';
            $topic->save();
        }

//cos nie dziala tu jak update!!!!!
        Studentstopic::updateOrCreate(
            ['id_student' => $user->id],
            [   'id_thesis' => $input['id_thesis'] ]
        );


        $topic = Thesis::find($input['id_thesis']);
        $topic->is_chosen = 'chosen';
        $topic->save();
//        $topic = Thesis::where('id', $input['id_thesis'])->first();
//        $topic->status = 'chosen';
//        $topic->save();

        return redirect("profile2");
    }

//    public function store(Request $request)
//    {
//
//        $user = Auth::user();
//
//        $input = $request->all();
//        $this->validator($input)->validate();
////        $input['id_student'] = $user->id;
//
//        $studentstopic = Studentstopic::where('id_student', $user->id)->first();
//
//        if ($studentstopic!=null){
//            $topic = Thesis::where('id', $studentstopic->id_thesis)->first();
//            $topic->status = 'not_chosen';
//            $topic->save();
//        }
//
//
//        Studentstopic::updateOrCreate(
//            ['id_student' => $user->id],
//            [   'id_thesis' => $input['id_thesis']
//            ]);


//        $studentstopic = Studentstopic::where('id_student', $id)->first();
//
//
//        if ( isset($studentstopic) ) {
//
//            $studentstopic->id_student = $input['id_student'];
//            $studentstopic->id_thesis = $input['id_thesis'];
//            $studentstopic->save();
//
//
//
//        }
//
//        else {
//            Studentstopic::create($input);
//        }
//
//        $topic = Thesis::where('id', $input['id_thesis'])->first();
//        $topic->status = 'chosen';
//        $topic->save();
//
//        return redirect("profile2");
//    }

    public function show_topic($id)
    {
        $topic = Thesis::findOrFail($id);
        $specialisations_array = explode( ';', $topic->specialisations );

        return view('student.topic', compact('topic', 'specialisations_array'));
    }

    public function show_prof($id)
    {
        $prof = Professor::findOrFail($id);
        $user = User::findOrFail($id);

        return view('student.student_prof', compact('prof', 'user'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_thesis' => 'required',
        ]);
    }

}


