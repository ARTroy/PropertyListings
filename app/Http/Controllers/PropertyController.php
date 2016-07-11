<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
	public function __construct(Property $property) {
        $this->property = $property;
    }

	public function profileIndex(){
		return view('public.property_profile');
	}

	public function view($id){
		return view('public.property');
	}

	public function edit($id){
		return view('user.property.edit');
	}

	public function store(){
		return view('user.property.store');
	}
}
