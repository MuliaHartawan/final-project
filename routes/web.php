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
Route::get('/', function () {
    return view('index');
});

Route::get('/hot', function () {
    return view('hot_issue/index');
});

Route::get('/viewadd', function () {
    return view('hot_issue/contohviewadd');
});

Route::get('/new', function () {
    return view('new_issue/index');
});

//Route::get('/home', 'HomeController@index')->name('home');


// Controller Master-master
// Master Pertanyaan

// Master Jawaban

// Master Tags




// Controller Transaksi


