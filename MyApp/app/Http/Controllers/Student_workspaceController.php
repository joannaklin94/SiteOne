<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('/student.workspace', compact('comments'));
    }


}
