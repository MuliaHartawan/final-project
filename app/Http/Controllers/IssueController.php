<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pertanyaan;

class IssueController extends Controller
{
    //
    public function index(){

    }

    public function hot(){

        $pertanyaanHot = Pertanyaan::withCount('jawaban')->orderBy('jawaban_count', 'DESC')->get();
        //dd($pertanyaanHot);

        return view('hot_issue.index', array('pertanyaanHot' => $pertanyaanHot));
    }

    public function new(){
        $new_issues = Pertanyaan::withCount('jawaban')->orderBy('created_at', 'DESC')->get();
        //dd($pertanyaanHot);

        return view('new_issue.index', array('new_issues' => $new_issues));
    }
}
