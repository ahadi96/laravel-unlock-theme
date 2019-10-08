<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['first_name','last_name','mobile'];

    public function details(){
        return $this->hasOne(ClientDetail::class);
    }
}
