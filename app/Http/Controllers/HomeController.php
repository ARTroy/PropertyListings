<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\UserInvite;

class HomeController extends Controller
{
	public function index(){
		$residential = PropertyType::where('use', '=', 'Residential')->get();
		$commercial = PropertyType::where('use', '=', 'Commercial')->get();
		return view('public.home', [ 
			'residential'=>$residential, 'commercial'=>$commercial
		]);
	}

	public function search(Request $request){

		$properties = Property::where('property.status', '=', 'published');
		if($request->input('property_type_resi') > 0){
			$properties = $properties->where('property.property_type_id', '=',$request->input('property_type_resi'));
		} else if($request->input('property_type_comm') > 0){
			$properties = $properties->where('property.property_type_id', '=',$request->input('property_type_resi'));
		}
		if(intval($request->input('max_slider')) != 1250000){
			$properties = $properties->where('property.asking_value', '<=',  $request->input('max_slider'));

		}
		$properties = $properties->where('property.asking_value', '>=', $request->input('min_slider'))
		->orderBy('property.asking_value', 'ASC')
		->get();
		
		dd($properties->all());

		return view('public.results', [ 
			'properties'=> $properties
		]);
	}
}
