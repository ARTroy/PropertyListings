<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
		$property_types = PropertyType::all();
		return view('user.property.create', 
			['user'=>$user,'property_types'=>$property_types]);
	}
}
