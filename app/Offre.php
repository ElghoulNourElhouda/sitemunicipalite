<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
	protected $fillable = [
        'work',
        'level',
        'formation',
        'location',
        'description',
        'users_id',
        'picture'
    ];
    protected $dates = ['published_at'];

    /*
     * An article is owned by a user
     */

    public function user($param) {
        return $this->belongsTo('App\User');
    }
    
    /*
     * setNameAttribute
     * if we want set address we do:
     * setAdressAtribute
     * this function is useful to manipulate data before save or retreive from database
     */

    public function setPublishedAtAttribute($date) {
        //$this->attributes['published_at'] = \Carbon\Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['published_at'] = \Carbon\Carbon::parse($date);
    }

    /*
     * query scope
     */

    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());  // not give the articles that published in the future
    }
    
        /*
     * query scope
     */

    public function scopeUpublished($query) {
        $query->where('published_at', '>', Carbon::now());  // give the articles that published in the future
    }

}
