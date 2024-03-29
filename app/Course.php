<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function trainers()
    {
        return $this->belongsToMany(Trainer::class);
    }
}
