<?php

namespace App\Http\Controllers;


use App\Student;
use App\Studentstopic;
use App\Thesis;
use App\Professor;
use App\User;
use Illuminate\Support\Facades\Input;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use Request;
use Validator;
use Illuminate\Session\Store;


class Profile2Controller extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $student = DB::table('students')
            ->join('users', 'users.id', 'students.student_id')
            ->join('roles', 'roles.role_id',  'users.role_id')
            ->join('specialisations', 'specialisations.specialisation_id', '=', 'students.specialisation_id')
            ->join('faculties', 'specialisations.faculty_id', '=', 'faculties.faculty_id')
            ->where('student_id', $user->id)
            ->first();

        $topic = DB::table('theses')
            ->join('students', 'students.thesis_id', 'theses.id')
            ->join('users', 'users.id', 'theses.id_prof')
                        ->select('users.name', 'users.surname','theses.title_ang', 'theses.id', 'theses.id_prof')
            ->where('student_id', $user->id)
            ->first();


        return view('student.profile', compact('student', 'topic'));
    }

    public function edit()
    {
        $user = Auth::user();
        $old_data = Student::where('student_id', $user->id)
            ->first();
        $faculties = DB::table('faculties')
            ->get();

        return view('student.edit_profile', compact('user', 'old_data', 'faculties'));
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

        Student::updateOrCreate(
            ['student_id' => $user->id],
            [   'student_number' => $input['student_number'],
                'faculty_id' => $input['faculty'],
                'specialisation_id' => $input['specialisation'],
                'degree' => $input['degree'],
                'telephone' => $input['telephone']
            ]);

        return redirect("profile2");
    }


    public function upload_avatar(Request $request)
    {
        if ( $request->hasFile('avatar')){
            $avatar=$request->file("avatar");
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(150, 150)->save( public_path('/uploads/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return redirect("profile2");
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'student_number' => 'required|numeric',
            'telephone' =>  'required|numeric',
        ]);
    }

}


