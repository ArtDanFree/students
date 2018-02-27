<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;

class homeController extends Controller
{
    public function __invoke()
    {
        $groups = Group::with('student.subject')->get();
        $students = Student::with('subject')->get();
        return view('index', ['groups' => $groups, 'students' => $students]);
    }
}
