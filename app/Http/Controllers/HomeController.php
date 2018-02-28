<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Group;
use App\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function home()
    {
        $groups = Group::with('student.subject')->get();
        $students = Student::with('subject')->get();
        return view('index', ['groups' => $groups, 'students' => $students]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Gallery::all()->where('student_id', \Auth::id());
        return view('home.home', ['images' => $images]);
    }
}
