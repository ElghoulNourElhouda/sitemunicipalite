<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $fillable = [
        'users_id',
        'article_id'
    ];

    public function article()
    {
        return $this->belongsTo('Article');
    }
}
