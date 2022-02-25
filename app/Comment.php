<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
     protected $fillable = [
        'comment_body',
       // 'vector',
        'published_at',
        'users_id',
        'article_id'
    ];

    public function article()
    {
        return $this->belongsTo('Article');
    }

    public function reply()
    {
        return $this->hasMany('Reply');
    }
}
