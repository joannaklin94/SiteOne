<?php

namespace App\Http\Controllers;


use App\Student;
use App\Professor;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use Request;
use Validator;
use Illuminate\Session\Store;

class Profile1Controller extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $role = DB::table('roles')
            ->where('role_id', $user->role_id)
            ->first();

        $prof = DB::table('professors')
            ->join('institutes', 'professors.institute_id', '=', 'institutes.institute_id')
            ->join('faculties', 'institutes.faculty_id', '=', 'faculties.faculty_id')
            ->select('professors.*', 'institutes.name_pol', 'faculties.faculty_pol')
            ->where('prof_id', $user->id)
            ->first();

        return view('prof.profile', compact('prof','user', 'role'));
    }

    public function edit()
    {
        $user = Auth::user();
        $old_profile = Professor::where('prof_id', $user->id)->first();
        $faculties = DB::table('faculties')
            ->get();

        return view('prof.edit_profile', compact('user', 'old_profile','faculties'));
    }

    public function ajax()
    {
        $faculty_id = Input::get('faculty_id');

        $faculties = DB::table('institutes')
            ->select('name_pol', 'institute_id')
            ->where('faculty_id', $faculty_id)
            ->get();

        return response()->json($faculties);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $input = $request->all();
        $this->validator($input)->validate();

        Professor::updateOrCreate(
            ['prof_id' => $user->id],
            [
                'prof_id' => $user->id,
                'room' => $input['room'],
                'visit_hours' => $input['visit_hours'],
                'institute_id' => $input['institute'],
                'faculty_id' => $input['faculty'],
                'telephone' => $input['telephone']
            ]);

        return redirect("profile1");
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

        return redirect("profile1");
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'telephone' =>  'required|numeric',
            'institute' =>  'required',
            'room' => 'required|alpha_num',
            'visit_hours' =>  'required',
        ]);
    }

}


