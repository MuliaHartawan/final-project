<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    //

    protected $table = 'jawaban';

    // whitelist
    // Menggunakan Jawaban::create(array_asosiatif)
    protected $fillable = ['jawaban', 'is_true', 'sum_vote'];

    protected $guarded = [];
    //Blacklist
   // protected $guarded = ['created_at', 'updated_at'];


    // Eloquent secara Manual
    public static function simpan($request){

        $new_jawaban = new Jawaban;
        $new_jawaban->jawaban = $request->jawaban;
        $new_jawaban->is_true = $request->is_true;
        $new_jawaban->sum_vote = $request->sum_vote;

        $new_jawaban->save();

        return $new_jawaban;
    } 
}
