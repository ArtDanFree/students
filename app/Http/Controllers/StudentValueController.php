<?php

namespace App\Http\Controllers;

use App\Student;
use App\SubjectsValue;
use Illuminate\Http\Request;

class StudentValueController extends Controller
{
    public function create($studentId)
    {
        $subjectsValues = SubjectsValue::all('student_id', 'subject_id')->where('student_id', $studentId);
        $subjects =  Student::converter($subjectsValues);
        return view('student.valueCreate',['subjects' => $subjects, 'studentId' => $studentId]);
    }

    public function store(Request $request, $studentId)
    {
        Student::createStudentValue($request->all(), $studentId);
        return \Redirect::route('student.show', $studentId);
    }

    public function edit($userId)
    {
        $student = Student::find($userId);
        $subjects = $student->subject;
        return view('student.valueEdit', ['student' => $student, 'subjects' => $subjects]);
    }

    public function update(Request $request, $studentId)
    {
        Student::converterUpdate($request->all(), $studentId);
        return \Redirect::route('student.show', $studentId);
    }
}
