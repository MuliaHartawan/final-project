<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $pertanyaan_max_vote  = Pertanyaan::where('id', 4)->first();
        //dd($pertanyaan_max_vote);
        dd($pertanyaan_max_vote->getTotalJawaban());
        // total comments
        //var_dump( $post->total_comments );

        // Get New Issue

        
        
        $data = array(
            'total_participant' => count($users),
            'total_pertanyaan'  => count($pertanyaanAll),
            'total_vote' => count($pertanyaanVote) + count($jawabanVote),
            'total_komentar' => count($jawabanKomentar) + count($komentarPertanyaan),
            'hot_issue' => '',
            'new_issue' => '',
        );

        return view('index', $data);
    }
}
