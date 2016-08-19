<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    public function address(){
        return $this->hasOne('App\Models\Address');
    }

    public function property_type(){
    	return $this->hasOne('App\Models\PropertyType', 'id','property_type_id');
    }
}