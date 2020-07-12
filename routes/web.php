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
//Route::get('/viewadd', 'IssueController@new');
Route::get('/new', 'IssueController@new');

// Middleware untuk proses auth, sehingga org harus login dulu baru bisa akses 
Route::group(['middleware' => 'auth'], function(){
    Route::resource('pertanyaan', 'PertanyaanController');
    Route::resource('jawaban', 'JawabanController');
    Route::get('/jawaban/tambah/{slug}', 'JawabanController@tambah');
    // Vote Pertanyaan
    Route::get('/pertanyaanvoteup/{pertanyaan_id}', 'VoteController@pertanyaanvoteup');
    Route::get('/pertanyaanvotedown/{pertanyaan_id}', 'VoteController@pertanyaanvotedown');

    // Vote Jawaban
    Route::get('/jawabanvoteup/{jawaban_id}', 'VoteController@jawabanvoteup');
    Route::get('/jawabanvotedown/{jawaban_id}', 'VoteController@jawabanvotedown');

    // Komentar Pertanyaan
    Route::get('/komentarpertanyaan/{pertanyaan_id}', 'KomentarPertanyaanController@create');
    Route::post('/komentarpertanyaan', 'KomentarPertanyaanController@store');

    // Komentar Jawaban
    Route::get('/komentarjawaban/{jawaban_id}', 'KomentarJawabanController@create');
    Route::post('/komentarjawaban', 'KomentarJawabanController@store');

    
});

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });


