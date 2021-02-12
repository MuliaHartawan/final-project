<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

use App\Models\Pertanyaan;
use App\Models\PertanyaanVote;
use App\Models\Jawaban;
use App\Models\JawabanVote;
use App\User;

class VoteController extends Controller
{
    //
    public function pertanyaanvoteup($pertanyaan_id){
        
        // Get pertanyaan
        $pertanyaan = Pertanyaan::where('id', $pertanyaan_id)->first();
        $new_vote = $pertanyaan->sum_vote + 1;
        $pertanyaan->sum_vote = $new_vote;
        
        // Get User by Pertanyaan
        $user = User::where('id', $pertanyaan->user->id)->first();
        $new_reputation = $pertanyaan->user->sum_reputation + 10;
        $user->sum_reputation = $new_reputation;
        // update Vote Pertanyaan
        
        $pertanyaan->save();
        $user->save();

        $user_id = Auth::id();

        // insert KomentarVote
        $pertanyaan_vote = PertanyaanVote::create([
                'up_vote' => 1,
                'down_vote' => 0,
                'pertanyaan_id' => $pertanyaan_id,
                'user_id' => $user_id
            ]);

        Alert::success('Berhasil', 'Menambahkan Vote pada Pertanyaan ini');

        return redirect("/jawaban"."/".$pertanyaan->slug);
    }

    public function pertanyaanvotedown($pertanyaan_id){
        
        // Get pertanyaan
        $pertanyaan = Pertanyaan::where('id', $pertanyaan_id)->first();
        $new_vote = $pertanyaan->sum_vote - 1;
        $pertanyaan->sum_vote = $new_vote;
        
        // Get User by Pertanyaan
        $user = User::where('id', $pertanyaan->user->id)->first();
        $new_reputation = $pertanyaan->user->sum_reputation - 1;
        $user->sum_reputation = $new_reputation;
        // update Vote Pertanyaan
        
        $pertanyaan->save();
        $user->save();

        $user_id = Auth::id();

        // insert KomentarVote
        $pertanyaan_vote = PertanyaanVote::create([
                'up_vote' => 0,
                'down_vote' => 1,
                'pertanyaan_id' => $pertanyaan_id,
                'user_id' => $user_id
            ]);

        Alert::success('Berhasil', 'Mengurangi Vote pada Pertanyaan ini');

        return redirect("/jawaban"."/".$pertanyaan->slug);
    }

    public function jawabanvoteup($jawaban_id){
        
        // Get pertanyaan
        $jawaban = Jawaban::where('id', $jawaban_id)->first();
        //dd($jawaban);
        $new_vote = $jawaban->sum_vote + 1;
        $jawaban->sum_vote = $new_vote;
        
        // Get User by Pertanyaan
        $user = User::where('id', $jawaban->user->id)->first();
        $new_reputation = $jawaban->user->sum_reputation + 10;
        $user->sum_reputation = $new_reputation;
        // update Vote Pertanyaan
        
        $jawaban->save();
        $user->save();

        $user_id = Auth::id();

        // insert KomentarVote
        $jawaban_vote = JawabanVote::create([
                'up_vote' => 1,
                'down_vote' => 0,
                'jawaban_id' => $jawaban_id,
                'user_id' => $user_id
            ]);
        $pertanyaan = Pertanyaan::where('id', $jawaban->pertanyaan_id)->first();

        Alert::success('Berhasil', 'Menambahkan Vote pada Jawaban ini');

        return redirect("/jawaban"."/".$pertanyaan->slug);
    }
    public function jawabanvotedown($jawaban_id){
        
        // Get pertanyaan
        $jawaban = Jawaban::where('id', $jawaban_id)->first();
        //dd($jawaban);
        $new_vote = $jawaban->sum_vote - 1;
        $jawaban->sum_vote = $new_vote;
        
        // Get User by Pertanyaan
        $user = User::where('id', $jawaban->user->id)->first();
        $new_reputation = $jawaban->user->sum_reputation - 1;
        $user->sum_reputation = $new_reputation;
        // update Vote Pertanyaan
        
        $jawaban->save();
        $user->save();

        $user_id = Auth::id();

        // insert KomentarVote
        $jawaban_vote = JawabanVote::create([
                'up_vote' => 0,
                'down_vote' => 1,
                'jawaban_id' => $jawaban_id,
                'user_id' => $user_id
            ]);
        $pertanyaan = Pertanyaan::where('id', $jawaban->pertanyaan_id)->first();

        Alert::success('Berhasil', 'Mengurangi Vote pada Jawaban ini');

        return redirect("/jawaban"."/".$pertanyaan->slug);
    }

    
}
