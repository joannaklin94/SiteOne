<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Student;
use App\UploadedFile;

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
        $files = array();
        $comments = array();

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
                ->orderBy('comments.created_at', 'asc')
                ->get();

            $files = DB::table('files')
                ->join('users', 'users.id', 'files.user_id')
                ->where('user_id', Auth::user()->id)
                ->orWhere('user_id', $prof->id_prof)
                ->where('student_id', Auth::user()->id)
                ->select('users.name', 'users.surname', 'files.*')
                ->orderBy('files.created_at', 'asc')
                ->get();
        }

        return view('/student.workspace', compact('comments', 'files'));
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

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $input = $request->all();

        $original_name = $file->getClientOriginalName();
        $filename = time() . '.' . $file->getClientOriginalName();

        $file->move('uploads/workspace_files', $filename);

        UploadedFile::create([
            'file_name' => $filename,
            'original_name' => $original_name,
            'description' => $input['description'],
            'user_id' => Auth::user()->id
        ]);

        return redirect('/workspace2');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'message' =>  'required',
        ]);
    }

}
