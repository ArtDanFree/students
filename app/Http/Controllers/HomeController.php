<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Group;
use App\Student;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $images = Gallery::all()->where('student_id', \Auth::id());
        return view('home.home', ['images' => $images]);
    }
}
