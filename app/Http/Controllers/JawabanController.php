<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('jawaban.create');
    }

    public function tambah($slug)
    {
        
        $pertanyaan = Pertanyaan::where('slug', $slug)->first();

        return view('jawaban.create', ['pertanyaan' => $pertanyaan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $messages = [
            'required' => 'Kolom Tidak Boleh Kosong'
        ];  
        
        //rules validasi inputan user
        Validator::make($request->all(), [
            'jawaban' => 'required',
        ], $messages)->validate();
        
        // Get session user
        $user_id = Auth::user()->id;
       // dd($user_id);

        // get post request
        $data = $request->all();
       // dd($request->all());
        // Create to Database
        $new_jawaban = Jawaban::create([
                            'jawaban' => $data['jawaban'],
                            'pertanyaan_id' => $data['pertanyaan_id'],
                            'user_id' => $user_id
                        ]);
    
        
        Alert::success('Berhasil', 'Menambahkan Jawaban Baru');

        return redirect("/jawaban"."/".$data['slug']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // get Pertanyaan
        $pertanyaan = Pertanyaan::withCount('jawaban')->where('slug', $slug)->first();

        // Jawaban Membantu
        $jawaban_ok = $pertanyaan->jawaban;
        $hasil_jawaban_ok = $jawaban_ok->filter(function($item) {
            return $item->is_true == 'Y';
        })->first();

        //dd($jawaban_ok);
        // Jawaban Lainnya
        $hasil_jawaban_lainnya = $jawaban_ok->filter(function($items) {
            return $items->is_true == 'N';
        });
        //dd($hasil_jawaban_lainnya);

        // Get session user
        $user_id = Auth::user()->id;

        
        $data = array(
            'session_user_id' => $user_id,
            'pertanyaan' => $pertanyaan,
            'hasil_jawaban_ok' => $hasil_jawaban_ok,
            'hasil_jawaban_lainnya_arr' => $hasil_jawaban_lainnya
        );
        //
        return view('jawaban.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
