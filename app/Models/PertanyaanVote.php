<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PertanyaanVote extends Model
{
    //
    protected $table = 'pertanyaanvote';
    protected $fillable = ['up_vote', 'down_vote', 'pertanyaan_id', 'user_id'];

    protected $guarded = [];
}
