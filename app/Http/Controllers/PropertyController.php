<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use Auth;

class PropertyController extends Controller
{
	public function view($id){
		return view('public.property');
	}

	public function edit($id){
		return view('user.property.edit');
	}

	public function create(){
		$user = Auth::user();
		$residential = PropertyType::where('use', '=', 'Residential')->get();
		$commercial = PropertyType::where('use', '=', 'Commercial')->get();
		return view('user.property.create', ['user'=>$user,
			'residential'=>$residential, 'commercial'=>$commercial
		]);
	}
}
