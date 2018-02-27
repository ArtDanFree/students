<?php

namespace App\Http\Controllers;

use App\Subject;
use App\SubjectsValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        Subject::create($request->all());
        return Redirect::route('subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subjects
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subjects
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subjects)
    {
        return view('subject.edit', ['subject' => $subjects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subjects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subjects)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $subject = Subject::find($subjects->id);
        $subject->update($request->all());
        return Redirect::route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subjects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subjects)
    {
        SubjectsValue::where('subject_id', $subjects->id)->delete();
        Subject::destroy($subjects->id);
        return Redirect::route('subject.index');
    }
}
