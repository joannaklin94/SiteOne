<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

use App\Http\Requests;

class StudentsController extends Controller
{
    public function index()
    {

        $students = Student:: all();
        //return $students; only json
        //return view('studentsExercise.index')->with('studentsExercise', $studentsExercise)
        return view('students.index', compact('students'));
    }

    public function show($id)
    {

        $student = Student::findOrFail($id);

        //return dd($student) ;   //if cannot find return null
        //return $id ;
        /*
        if (! $student){
            abort(404);
        }
        */


        return view('students.show', compact('student'));
    }

    public function create()
    {
        return view('studentsExercise.create');
    }
}
