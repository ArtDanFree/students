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

Route::resource('group', 'GroupController');
Route::resource('student', 'StudentController')->except(['create', 'store']);
Route::resource('subject', 'SubjectController');
Route::resource('subjectValue', 'SubjectValueController');
Route::resource('gallery', 'GalleryController');

Route::get('student/{student_id}/valueCreate', 'StudentValueController@create')->name('studentValue.create');
Route::post('student/{student_id}/valueCreate', 'StudentValueController@store')->name('studentValue.store');

Route::get('student/{student_id}/valueUpdate', 'StudentValueController@edit')->name('studentValue.edit');
Route::post('student/{student_id}/valueUpdate', 'StudentValueController@update')->name('studentValue.Update');


Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');
Route::get('/', 'HomeController@home');