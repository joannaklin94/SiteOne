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

        $topics = Thesis::where('status', '=', 'not_chosen')
            ->where('degree', '=', $student->degree)
            ->get();

        $student_spec = $student->specialisation;

                foreach ($topics as $topic){

                    $specialisations_for_topic = $topic->specialisations;
                    $array = explode(';', $specialisations_for_topic);

                    if ( in_array($student_spec, $array)){


                        $prof_id = $topic->id_prof;
                        $prof = User::find($prof_id);

                        $topic['name'] = $prof->name;
                        $topic['surname'] = $prof->surname;
                        $topic['flag'] =  1;  //topic adequate for student

                    }

                    else {
                        $topic['flag'] =  0;
                    }

                }

        return view('student.edit_topic', compact('topics', 'student'));
    }



    public function store(Request $request)
    {

        $id = Auth::user()->id;

        $input = $request->all();
        $this->validator($input)->validate();
        $input['id_student'] = $id;


        $studentstopic = Studentstopic::where('id_student', $id)->first();


        if ( isset($studentstopic) ) {

            $studentstopic->id_student = $input['id_student'];
            $studentstopic->id_thesis = $input['id_thesis'];
            $studentstopic->save();



        }

        else {
            Studentstopic::create($input);
        }

        $topic = Thesis::where('id', '=', $input['id_thesis'])->first();
        $topic->status = 'chosen';
        $topic->save();

        return redirect("profile2");
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_thesis' => 'required',
        ]);
    }

}


