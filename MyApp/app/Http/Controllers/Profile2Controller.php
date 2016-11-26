<?php

namespace App\Http\Controllers;


use App\Student;
use App\Studentstopic;
use App\Thesis;
use App\Professor;
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
        $student = Student::where('id', $user->id)
            ->first();
        $topic = Studentstopic::where('id_student', $user->id)
            ->first();

        if ($topic)
        {
            $topic = Thesis::where('id', $topic->id_thesis)
                ->first();
            $user = User::where('id', $topic->id_prof)
                ->first();
            $topic['name'] = $user->name;
            $topic['surname'] = $user->surname;
        }

        return view('student.profile', compact('student', 'topic'));
    }

    public function edit()
    {
        $user = Auth::user();
        $old_data = Student::where('id', $user->id)
            ->first();

        return view('student.edit_profile', compact('user', 'old_data'));
    }



    public function store(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $this->validator($input)->validate();

        Student::updateOrCreate(
            ['id' => $user->id],
            [   'student_number' => $input['student_number'],
                'specialisation' => $input['specialisation'],
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


