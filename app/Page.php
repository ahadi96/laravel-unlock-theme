<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title'];
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
