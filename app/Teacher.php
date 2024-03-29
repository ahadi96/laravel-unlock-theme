<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function classes(){
        return $this->belongsToMany(StudentClass::class,'classe_teacher','teacher_id','class_id');
    }
}
