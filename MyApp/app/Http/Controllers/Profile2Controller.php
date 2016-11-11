<?php

namespace App\Http\Controllers;


use App\Student;
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
//        $id = Auth::user()->id;
        $student = DB::table('students')
            ->where('id', $user->id)
            ->first();

//        $student = DB::table('students')
//            ->whereExists(function ($query) {
//                $id = Auth::user()->id;
//                $query
//                    ->from('students')
//                    ->where('student_id', $id)->first();
//            })
//            ->get();


        return view('student.profile', compact('student','user'));
    }

    public function edit()
    {
        $user = Auth::user();

//        $topics = Thesis::get()

        return view('student.edit_profile', compact('user'));
    }



    public function store(Request $request)
    {

        $id = Auth::user()->id;

        $input = $request->all();
        $this->validator($input)->validate();
        $input['id'] = $id;
        $input['status'] = 1;

        $student = Student::find($id);


        if ( $student != null ) {
            $student->student_number = $input['student_number'];
            $student->specialisation = $input['specialisation'];
            $student->degree = $input['degree'];
            $student->tel = $input['tel'];
            $student->save();
        }

        else {
            Student::create($input);
    }

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
            'tel' =>  'required|numeric',
        ]);
    }

}


