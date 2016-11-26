<?php

namespace App\Http\Controllers;



use App\Student;
use App\Professor;
use App\Studentstopic;
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




class ProfstudentsController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $students = DB::table('theses')
            ->where('id_prof', $user->id)
            ->where('is_chosen', 'chosen')
            ->join('studentstopics', 'theses.id', '=', 'studentstopics.id_thesis')
            ->join('users', 'users.id', '=', 'studentstopics.id_student')
            ->join('students', 'users.id', '=', 'students.id')
            ->select('theses.title', 'theses.degree', 'users.name', 'users.id','users.surname', 'students.status')
            ->get();

        $active_past_students = array();
        $active_past_students['active'] =0;
        $active_past_students['past'] =0;

        foreach ($students as $student)
        {

            if ($student->status)
            $active_past_students['active'] += 1;
            else
                $active_past_students['past'] +=1;
        }

        return view('prof.prof_students', compact('students', 'user','active_past_students'));
    }


    public function show_workspace($id)
    {
//        $topic = Thesis::findOrFail($id);
//        $specialisations_array = explode( ';', $topic->specialisations );
//        $student = User::findOrFail($id);
        $prof = Auth::user();

        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('users.name', 'users.surname','users.avatar','comments.message', 'comments.created_at')
            ->where('comments.user_id', '=',$prof->id)
            ->where('comments.id_student', '=',$id)
            ->orWhere('comments.user_id', '=',$id)
//            ->oldest()
            ->get();


        return view('prof.student_workspace',compact('comments','id'));
    }

    public function show_student($id)
    {
        $student = Student::findOrFail($id);
        $user = User::findOrFail($id);
        $topic = DB::table('studentstopics')
            ->where('id_student', $user->id)
            ->join('theses', 'theses.id', '=', 'studentstopics.id_thesis')
            ->select('theses.title', 'theses.degree')
            ->first();

        return view('prof.student', compact('student', 'user', 'topic'));
    }


}


