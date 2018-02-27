<?php

namespace App\Http\Controllers;

use App\SubjectValue;
use Illuminate\Http\Request;

class SubjectValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        echo 123;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubjectValue  $SubjectValue
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectValue $SubjectValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubjectValue  $SubjectValue
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectValue $SubjectValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubjectValue  $SubjectValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectValue $SubjectValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubjectValue  $SubjectValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectValue $SubjectValue)
    {
        //
    }
}
