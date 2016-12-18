<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Student;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;
//use Input;

class Student_workspaceController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $prof = DB::table('students')
            ->join('theses', 'theses.id', 'students.thesis_id')
            ->where('student_id', $user->id)
            ->select('theses.id_prof')
            ->first();

        if( isset($prof->id_prof) )
        {
            $comments = DB::table('comments')
                ->join('users', 'users.id', 'comments.user_id')
                ->where('user_id', $user->id)
                ->OrWhere('user_id', $prof->id_prof)
                ->Where('id_student', $user->id)
                ->select('users.name', 'users.surname', 'users.avatar', 'comments.message', 'comments.created_at')
                ->get();
        }

        return view('/student.workspace', compact('comments'));
    }

    public function create_comment ()
    {
        $user = Auth::user();
        $input = Input::get('message');
//        $this->validator($input)->validate();

        Comment::create([
            'comment_id' => null,
            'message' => $input,
            'user_id' => $user->id,
        ]);
        $new_comment = DB::table('comments')
            ->join('users', 'users.id', 'comments.user_id')
            ->select('users.name', 'users.surname', 'users.avatar', 'comments.message', 'comments.created_at')
            ->latest()
            ->first();

        return response()->json($new_comment);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'message' =>  'required',
        ]);
    }

}
