<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function tambah (){
        return view("pertanyaan.tambah");
    }
}
