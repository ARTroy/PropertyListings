<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'room';

    public function roomType()
    {
        return $this->hasOne('App\Models\RoomType', 'id', 'room_type_id');
    }

    public function property(){
    	return $this->hasOne('App\Models\Property', 'id', 'property_id');
    }
}