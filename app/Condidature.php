<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condidature extends Model
{
    //
     protected $fillable = [
        'body',
        'users_id',
        'offre_id',
        'docs'
    ];

    public function article()
    {
        return $this->belongsTo('Article');
    }

}
