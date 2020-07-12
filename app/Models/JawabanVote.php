<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanVote extends Model
{
    //
    protected $table = 'jawabanvote';
    protected $fillable = ['up_vote', 'down_vote', 'jawaban_id', 'user_id'];

    protected $guarded = [];
}
