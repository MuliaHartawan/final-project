<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanKomentar extends Model
{
    //
    protected $table = 'jawabankomentar';

    public function user(){
        return $this->belongsTo('App\User');
    }

     // Many to One dengan Pertanyaan
     public function jawaban(){
        return $this->belongsTo('App\Models\Jawaban');
    }
}
