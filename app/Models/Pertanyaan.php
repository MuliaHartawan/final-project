<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    //

    protected $table = 'pertanyaan';
    protected $fillable = ['judul', 'isi', 'tags', 'user_id', 'slug'];
    protected $guard = [];
    
    // One to Many dengan Jawaban
    public function jawaban(){

        return $this->hasMany('App\Models\Jawaban');
    }

    // One to Many dengan Komentar Pertanyaan
    public function komentarpertanyaan(){
        
        return $this->hasMany('App\Models\KomentarPertanyaan');
    }

    // One to Many dengan  Pertanyaan Vote
    public function pertanyaanvote(){
        
        return $this->hasMany('App\Models\PertanyaanVote');
    }
    
    // One to Many dengan pertanyaan Tag
    public function pertanyaantag(){
        
        return $this->hasMany('App\Models\PertanyaanTag');
    }

    // Many to One dengan User
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag', 'pertanyaantags', 'pertanyaan_id', 'tag_id');
    }

    
}
