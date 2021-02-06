<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'content', 'category_id'];
    protected $guarded = [];

    function category(){
        return $this->belongsTo('App\Category');
    }

    function comment()
    {
        return $this->HasMany('App\Comment');
    }
}
