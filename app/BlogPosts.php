<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model
{
    public function posts(){
        return $this->hasMany('App\BlogPost');
    }
}