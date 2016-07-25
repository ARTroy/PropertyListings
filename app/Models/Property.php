<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    public function addresses(){
        return $this->hasMany('App\Models\Address');
    }
}