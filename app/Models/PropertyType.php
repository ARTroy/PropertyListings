<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $table = 'property_type';

    public function validRoomTypes()
    {
        return $this->belongsToMany('App\Models\RoomType', 'property_type_room_type', 'property_type_id', 'room_type_id');
    }
}