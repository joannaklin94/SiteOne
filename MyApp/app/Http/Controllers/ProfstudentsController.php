<?php

namespace App\Http\Controllers;

use App\Student;
use App\Professor;
use App\Studentstopic;
use App\UploadedFile;
use App\User;
use App\Thesis;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use Request;
use Validator;
use Illuminate\Session\Store;
use File;

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
            ->join('students', 'theses.id', 'students.thesis_id')
            ->join('users', 'users.id', 'students.student_id')
            ->select('theses.title_ang', 'theses.degree', 'users.name', 'users.id','users.surname', 'students.status')
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

        return view('prof.prof_students', compact('students', 'user','active_past_students', 'free_students', 'free_topics'));
    }


    public function chose_student()
    {
        $user = Auth::user();

        $free_topics = DB::table('theses')
            ->where('is_chosen', 'not_chosen')
            ->where('id_prof', $user->id)
            ->get();

        $free_students = DB::table('users')
            ->join('students', 'students.student_id', 'users.id')
            ->join('specialisations', 'specialisations.specialisation_id', 'students.specialisation_id')
            ->where('role_id', 3)
            ->whereNotIn('id', function($sub_query){
                $sub_query->select('student_id')
                    ->from('students')
                    ->whereNotNull('thesis_id');
            })->get();

        return view('prof.chose_students', compact('free_students', 'free_topics'));
    }


    public function ajax()
    {
        $student_id = Input::get('student_id');
        $prof = Auth::user();

        $student = DB::table('students')
            ->select('specialisation_id','degree')
            ->where('student_id',$student_id)
            ->first();

        $topics = DB::table('theses')
            ->select('id', 'title_ang', 'specialisations')
            ->where('id_prof',$prof->id)
            ->where('is_chosen', 'not_chosen')
            ->where('degree', $student->degree)
            ->get();

        $key = 0;
        $i = 0;
        $to_delete = array();

        foreach($topics as $topic)
        {
            $pos = str_contains($topic->specialisations, $student->specialisation_id);
            if(!$pos)
            {
                $to_delete[$key] = $i;
                $i++;
            }
            $key++;
        }
        $free_topics = $topics->diffKeys($to_delete);

        return response()->json($free_topics);
    }

    public function store(Request $request)
    {

        $input = $request->all();

        $student = Student::find($input['student_id']);
        $student->thesis_id = $input['topic_id'];
        $student->save();

        $topic = Thesis::find($input['topic_id']);
        $topic->is_chosen = 'chosen';
        $topic->save();


        return redirect("/prof_students");
    }

    public function show_workspace($id)
    {


//        $topic = Thesis::findOrFail($id);
//        $specialisations_array = explode( ';', $topic->specialisations );
//        $student = User::findOrFail($id);
        $prof = Auth::user();

        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', 'users.id')
//            ->select('users.name', 'users.surname','users.avatar','comments.message', 'comments.created_at')
            ->where('comments.user_id', '=',$prof->id)
            ->where('comments.id_student', '=',$id)
            ->orWhere('comments.user_id', '=',$id)
//            ->latest()
            ->get();

        $files = DB::table('files')
            ->join('users', 'users.id', 'files.user_id')
            ->where('user_id', Auth::user()->id)
            ->where('student_id', '=',$id)
            ->orWhere('user_id', $id)
            ->select('users.name', 'users.surname', 'files.*')
            ->latest()
            ->get();


//        return dd($files);

        return view('prof.student_workspace',compact('comments','id', 'files'));
    }

    public function upload(Request $request)
    {
//        print_r($request->all());
//        $file = $request->file('file');
//
//        if(!empty($file))
//        {
//            $original_name = $file->getClientOriginalName();
//            $filename = time() . '.' . $file->getClientOriginalName();
//            $file ->move('uploads/workspace_files',$filename);
////            $file ->move('../storage/workspace_files',$filename);
//
//
//            UploadedFile::create([
//                'file_name' => $filename,
//                'original_name' => $original_name,
//                'description' => $request['description'],
//                'student_id' => $request['student_id'],
//                'user_id' => Auth::user()->id
//            ]);

//            $file =  UploadedFile::where('file_name', $filename)
//                ->first();

            $faculty_id = Input::get('faculty_id');

            $faculties = DB::table('institutes')
                ->select('name_pol', 'institute_id')
                ->where('faculty_id', $faculty_id)
                ->get();

            return response()->json($faculties);

        }

//        return response()->json($file);

//    }

    public function view_uploads()
    {
        $id = Input::get('id');

        $files = DB::table('files')
            ->join('users', 'users.id', 'files.user_id')
            ->where('user_id', Auth::user()->id)
            ->where('student_id', '=',$id)
            ->orWhere('user_id', Auth::user()->id)
            ->latest()
            ->get();

        return response()->json($files);

    }

    public function file_ajax()
    {

        $file =  UploadedFile::latest()
            ->first();

        return response()->json($file);

    }



    public function download($file_name)
    {
        $path = '../public/uploads/workspace_files/' . $file_name;
        $file_path = storage_path($path);

        return response()->download($file_path);
    }

    public function delete_ajax ()
    {
//        $path = '../public/uploads/workspace_files/' . $file_name;
//                $path = 'workspace_files/' . $file_name;
//        $path = 'public/uploads/workspace_files/' . $file_name;


//        $file_path = storage_path($path);
//        Storage::delete($file_path);

        $id = Input::get('id');

        UploadedFile::where('id', $id)->delete();
//        $file_path = storage_path($path);

//        Storage::delete($file_path);


//        File::Delete($file_path);


//        return redirect("/prof_students/workspace/{id}");
        return response()->json($id);
    }

    public function show_student($id)
    {
        $student= DB::table('students')
            ->where('student_id', $id)
            ->join('specialisations', 'students.specialisation_id', 'specialisations.specialisation_id')
            ->join('faculties', 'faculties.faculty_id', 'specialisations.faculty_id')
            ->join('theses', 'theses.id', 'students.thesis_id')
            ->join('users', 'users.id', 'students.student_id')
            ->first();

        return view('prof.student', compact('student'));
    }


}


