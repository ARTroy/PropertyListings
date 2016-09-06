<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use App\Models\RoomType;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\UserInvite;

class HomeController extends Controller
{
	public function index(){
		$residential = PropertyType::where('use', '=', 'Residential')->get();
		$commercial = PropertyType::where('use', '=', 'Commercial')->get();
		
		$properties = Property::where('property.status', '=', 'published')
		->orderBy('property.created_at', 'DESC')
		->take(4)->get();

		return view('public.home', [ 
			'residential'=>$residential,
			'commercial'=>$commercial,
			'last_two'=>$properties
		]);
	}

	public function search(Request $request){
		if($request->input('market') == 'Commercial'){
			$types = PropertyType::where('use', '=', 'Commercial')->get()->keyBy('id');
		}
		if($request->input('market') == 'Residential'){
			$types = PropertyType::where('use', '=', 'Residential')->get()->keyBy('id');
		}

		$properties = Property::where('property.status', '=', 'published');
		if($request->input('property_type_resi') > 0){
			$properties = $properties->where('property.property_type_id', '=',$request->input('property_type_resi'));
		} else if($request->input('property_type_comm') > 0){
			$properties = $properties->where('property.property_type_id', '=',$request->input('property_type_comm'));
		}

		if(intval($request->input('max_slider')) != 1250000){
			$properties = $properties->where('property.asking_value', '<=',  $request->input('max_slider'));
		}
		$properties = $properties->where('property.asking_value', '>=', $request->input('min_slider'))
		->orderBy('property.asking_value', 'ASC')
		->paginate(10);

		return view('public.results', [
			'market'=> $request->input('market'),
			'types'=> $types,
			'properties'=> $properties
		]);
	}
}
