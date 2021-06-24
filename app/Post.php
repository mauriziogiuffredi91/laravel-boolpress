<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'content',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }


    //relation with tag (Many to Many)
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

}
