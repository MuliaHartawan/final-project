<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

use App\Models\Pertanyaan;
use App\Models\PertanyaanVote;
use App\Models\JawabanVote;
use App\Models\JawabanKomentar;
use App\Models\KomentarPertanyaan;



class DashboardController extends Controller
{
    //

    public function index(){
        // Isian Atasn
        $users = User::all();
        $pertanyaanAll = Pertanyaan::all();
        $pertanyaanVote = PertanyaanVote::all();
        $jawabanVote = JawabanVote::all();
        $jawabanKomentar = JawabanKomentar::all();
        $komentarPertanyaan = KomentarPertanyaan::all();

        // get Hot Issue
        $pertanyaanCountJawaban = Pertanyaan::withCount('jawaban')->orderBy('jawaban_count', 'DESC')->first();
       
        // Get New Issue
        $new_issue = Pertanyaan::withCount('jawaban')->orderBy('created_at', 'DESC')->first();

        
        //dd(Auth::user());
        
        $data = array(
            'total_participant' => count($users),
            'total_pertanyaan'  => count($pertanyaanAll),
            'total_vote' => count($pertanyaanVote) + count($jawabanVote),
            'total_komentar' => count($jawabanKomentar) + count($komentarPertanyaan),
            'hot_issue' => $pertanyaanCountJawaban,
            'new_issue' => $new_issue
        );

        return view('index', $data);
    }
}
