<?php

namespace App\Http\Controllers;


use App\Professor;
use App\Student;
use App\Ad;
use App\Studentstopic;
use App\Thesis;
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


class AdminController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $users = DB::table('users')
            ->get();

        $students = DB::table('users')
            ->where('role_id', 3)
            ->get();

        $profs = DB::table('users')
            ->where('role_id', 2)
            ->get();

        $topics =  DB::table('theses')
            ->get();

        $ads = DB::table('ads')
            ->get();


        $files = DB::table('files')
            ->get();

        return view('admin.home', compact('users', 'profs', 'ads', 'topics', 'students', 'files'));
    }

    public function users()
    {
        $users = DB::table('users')
            ->join('roles', 'users.role_id', 'roles.role_id')
            ->get();

        return view('admin.web_users', compact('users'));
    }

    public function delete()
    {
        $id = Input::get('id');
        DB::table('users')->where('id', $id)->delete();

//        return redirect("web_users");
        return response()->json(['message' => 'success']);
    }

    public function settings()
    {

        return view('admin.settings');
    }

    public function ajax_faculties()
    {
        $faculties = DB::table('faculties')->get();

        return response()->json($faculties);
    }

    public function ajax_specialisations()
    {
        $specialisations = DB::table('specialisations')
            ->join('faculties', 'faculties.faculty_id', 'specialisations.faculty_id')
            ->get();

        return response()->json($specialisations);
    }

    public function ajax_institutions()
    {
        $institutes = DB::table('institutes')
            ->join('faculties', 'faculties.faculty_id', 'institutes.faculty_id')
            ->get();

        return response()->json($institutes);
    }






}


