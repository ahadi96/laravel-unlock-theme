<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
    protected $fillable = ['nationality','dob','identity_number'];
    
    public function client(){
        return $this->belongsTo(Client::class);
    }
}


