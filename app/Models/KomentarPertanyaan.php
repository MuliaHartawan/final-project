<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomentarPertanyaan extends Model
{
    //
    protected $table = 'komentarpertanyaan';

     // Many to One dengan User
     public function user(){
        return $this->belongsTo('App\User');
    }

     // Many to One dengan Pertanyaan
     public function pertanyaan(){
        return $this->belongsTo('App\Models\Pertanyaan');
    }
}
