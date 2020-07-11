<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Controller General 
Route::get('/', 'DashboardController@index');

Route::get('/hot', 'IssueController@hot');

Route::get('/viewadd', 'IssueController@new');

Route::get('/new', 'IssueController@new');

Route::get('/pertanyaan/create', 'PertanyaanController@create');


// Controller Master-master
// Master Pertanyaan
Route::resource('pertanyaan', 'PertanyaanController');

// Master Jawaban
Route::resource('jawaban', 'JawabanController');

