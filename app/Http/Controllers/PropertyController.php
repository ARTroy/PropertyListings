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

	public function store(Request $request, Property $property){
		$image = $request->file('image');
		try 
    	{
    		$extension = $image->getClientOriginalExtension();
    		$imageRealPath = $image->getRealPath();
    		$thumbName = $image->getClientOriginalName();
	    
	    	$img = Image::make($imageRealPath); // use this if you want facade style code
	    	$img->resize(intval(400), null, function($constraint) {
	    		 $constraint->aspectRatio();
	    	});
	    	$img->save(public_path('images'). '/'. $thumbName);
    	}
    	catch(Exception $e) {
    		return back()->withErrors('Image upload failed.');;
    	}
	}
}
