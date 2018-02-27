<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;
use App\SubjectsValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('group', 'subject')->get();
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all('id', 'name');
        return view('student.create', ['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|string',
            'dob' => 'required|string'
        ]);
        Student::create($request->all());
        return Redirect::route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $groups = Group::all('id', 'name');
        return view('student.edit', ['student' => $student, 'groups' => $groups]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'full_name' => 'required|string',
            'dob' => 'required|string'
        ]);
        Student::updateStudent($request, $student->id);
        return Redirect::route('student.show', $student->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        SubjectsValue::where('student_id', $student->id)->delete();
        Student::destroy($student->id);
        return Redirect::route('student.index');
    }
}