<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
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
}
