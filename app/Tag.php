<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Relation with Post (many to many)

    public function posts(){
        return $this->belongsToMany('App\Post'); 
    }
}
