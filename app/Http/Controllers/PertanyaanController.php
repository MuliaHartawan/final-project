<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index()
    {
    	$issue = Issue::all();
    	return view('issue', ['issue' => $issue]);
    }
 
    public function tambah()
    {
    	return view('pertanyaan.tambah');
    }
}
