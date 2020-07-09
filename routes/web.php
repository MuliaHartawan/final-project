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

<<<<<<< HEAD
Auth::routes();

// Controller General 
Route::get('/', function () {
    return view('index');
});

Route::get('/hot', function () {
    return view('hot_issue/index');
});

Route::get('/home', 'HomeController@index')->name('home');


// Controller Master-master
// Master Pertanyaan

// Master Jawaban

// Master Tags




// Controller Transaksi

=======
Route::get('/index', function () {
    return view('index');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tambah-pertanyaan', 'PertanyaanController@tambah');
>>>>>>> 89bc4d2582d8be971d9eaebd55d4aae1253fca86
