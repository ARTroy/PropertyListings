<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    public function addresses(){
        return $this->hasMany('App\Models\Address');
    }

    public function property_type(){
    	return $this->hasOne('App\Models\PropertyType');
    }
}