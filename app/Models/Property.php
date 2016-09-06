<?php

namespace App\Models;

use DB;
use App\Models\Room;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    public function address(){
        return $this->hasOne('App\Models\Address');
    }

    public function rooms(){
    	 return $this->hasMany('App\Models\Room', 'property_id', 'id');
    }

    public function property_type(){
    	return $this->hasOne('App\Models\PropertyType', 'id','property_type_id');
    }

    public function short_room_summary($property_type){
        if($property_type->use == 'Residential'){
            return DB::table('room') ->select(DB::raw('COUNT(*) as count'), 'room_type.display_class')
            ->join('room_type', 'room_type.id','=','room.room_type_id')
            ->where('property_id', '=', $this->id)
            ->whereIn('room_type.type_name', ['Bedroom', 'Lounge', 'Bathroom', 'Parking', 'Covered Parking'])
            ->groupBy('room_type_id')->get();
            //->lists('count','room_type_id');
        } else if($property_type->use == 'Commercial'){
            return DB::table('room') ->select(DB::raw('COUNT(*) as count'), 'room_type.display_class')
            ->join('room_type', 'room_type.id','=','room.room_type_id')
            ->where('property_id', '=', $this->id)
            ->whereIn('room_type.type_name', ['Bedroom', 'Lounge', 'Bathroom','Parking', 'Covered Parking'])
            ->groupBy('room_type_id')->get();
            //->lists('count','room_type_id');
        }
        
    }
}