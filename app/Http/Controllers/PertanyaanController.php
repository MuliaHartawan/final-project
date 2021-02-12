<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Tag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
// Namespace Slug
use Illuminate\Support\Str;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::id();
        //dd($id);
        //$pertanyaan = Pertanyaan::where('user_id', $id)->get();
        $pertanyaan = Pertanyaan::withCount('jawaban')->where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        
        return view('pertanyaan.index', ['pertanyaan' => $pertanyaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pertanyaan.create');
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
            'judul' => 'required',
            'isi' => 'required'
        ], $messages)->validate();
        
        // Get session user
        $user_id = Auth::user()->id;

        // get post request
        $data = $request->all();

        // Create to Database
        $new_pertanyaan = Pertanyaan::create([
                            'judul' => $data['judul'],
                            'isi' => $data['isi'],
                            'tags' => $data['tags'],
                            'slug' => Str::slug($data['judul'], '-'), // Make Slug Link
                            'user_id' => $user_id
                        ]);
        
        $tagArra = explode(',', $data['tags']);
        //$tagMulti = array();
        foreach ($tagArra as  $value) {
            # code...
            $tagArrAssoc["name"] = trim($value);
            $tag = Tag::firstOrCreate($tagArrAssoc);

            $new_pertanyaan->tags()->attach($tag->id);
            
        }
        //dd($tagMulti);
        //dd($tag)
        // Crete Tag baru
        //$tag = Tag::firstOrCreate($tagMulti);
        Alert::success('Berhasil', 'Menambahkan Pertanyaan Baru');

        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Auth::id();
        //dd($id);
        //$pertanyaan = Pertanyaan::where('user_id', $id)->get();
        $pertanyaan = Pertanyaan::withCount('jawaban')->where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        
        return view('pertanyaan.show', ['pertanyaan' => $pertanyaan]);
        
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

        $deletedRows = Pertanyaan::where('id', $id)->delete();
        if($deletedRows == 1){
            Alert::success('Berhasil', 'Menghapus Data');      
        }else{
            Alert::error('Gagal', 'Menghapus Data'); 
        }

        return redirect('/pertanyaan');
       
    }

}
