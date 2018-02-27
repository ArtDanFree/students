<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'homeController')->name('home');
Route::resource('group', 'GroupController');
Route::resource('student', 'StudentController');
Route::resource('subject', 'SubjectController');
Route::resource('subjectValue', 'SubjectValueController');

Route::get('student/{student_id}/valueCreate', 'StudentValueController@create')->name('studentValue.create');
Route::post('student/{student_id}/valueCreate', 'StudentValueController@store')->name('studentValue.store');

Route::get('student/{student_id}/valueUpdate', 'StudentValueController@edit')->name('studentValue.edit');
Route::post('student/{student_id}/valueUpdate', 'StudentValueController@update')->name('studentValue.Update');

