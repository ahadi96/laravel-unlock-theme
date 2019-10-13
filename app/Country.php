<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function user(){
        return $this->hasMany(User::class);
    }

    public function posts(){
        return $this->hasManyThrough(Post::class,User::class);
    }
}
