<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\KomentarPertanyaan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KomentarPertanyaanController extends Controller
{
    //

    public function create($pertanyaan_id){
        $pertanyaan = Pertanyaan::where('id', $pertanyaan_id)->first();

        return view('komentarpertanyaan.create', ['pertanyaan' => $pertanyaan]);
    }

    public function store(Request $request)
    {
        //
         $messages = [
            'required' => 'Kolom Tidak Boleh Kosong'
        ];  
        
        //rules validasi inputan user
        Validator::make($request->all(), [
            'komentar' => 'required',
        ], $messages)->validate();
        
        // Get session user
        $user_id = Auth::user()->id;
       // dd($user_id);

        // get post request
        $data = $request->all();
       // dd($request->all());
        // Create to Database
        $new_jawaban = KomentarPertanyaan::create([
                            'komentar' => $data['komentar'],
                            'pertanyaan_id' => $data['pertanyaan_id'],
                            'user_id' => $user_id
                        ]);
    
        
        Alert::success('Berhasil', 'Menambahkan Komentar Baru');

        return redirect("/jawaban"."/".$data['slug']);
    }
}
