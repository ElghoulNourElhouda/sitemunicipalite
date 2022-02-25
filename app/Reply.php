<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
     protected $fillable = [
        'content',
       // 'vector',
        'users_id',
        'comment_id'
    ];

     public function comment()
    {
        return $this->belongsTo('Comment');
    }
}
