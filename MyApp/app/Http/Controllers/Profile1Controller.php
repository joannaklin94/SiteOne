<?php

namespace App\Http\Controllers;


use App\Student;
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
        $prof = DB::table('professors')
            ->where('id', $user->id)
            ->first();

        return view('prof.profile', compact('prof','user'));
    }

    public function edit()
    {
        $user = Auth::user();
        $old_profile = Professor::find($user->id);

        return view('prof.edit_profile', compact('user', 'old_profile'));
    }

    public function store(Request $request)
    {

        $user = Auth::user();

        $input = $request->all();
        $this->validator($input)->validate();
        $input['id'] = $user->id;

        Professor::updateOrCreate(
            ['id' => $user->id],
            [   'room' => $input['room'],
                'visit_hours' => $input['visit_hours'],
                'institute' => $input['institute'],
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
            'room' => 'required|alpha_num',
             'visit_hours' =>  'required',
        ]);
    }

}


