<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $table = 'classes';

    public function teachers(){
        return $this->belongsToMany(Teacher::class,'classe_teacher','class_id','teacher_id');
    }
}
