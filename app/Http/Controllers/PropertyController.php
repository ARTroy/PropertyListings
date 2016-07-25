<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyType;
use Validator;
use Image;
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

	public function store(Request $request, Property $property, Address $address){
        $validator = Validator::make( $request->all(), [
            'title' => 'required|min:4|alpha_dash',
            'property_type' => 'required|min:4',
            'line1' => 'required',
            'postcode' => 'required|min:6|alpha_dash',
            'image' => 'required|image',
            'property_type' =>'required|exists:property_type,id',
        ]);
        
        if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
        } else {
			try 
	    	{	
	    		$image =  $request->file('image');
	    		$image_name =  $image->getClientOriginalName();
	    		$imageRealPath =  $image->getRealPath();
	    		$extension =  $image->getClientOriginalExtension();

		    	$img = Image::make($imageRealPath); // use this if you want facade style code
		    	$img->resize(intval(400), null, function($constraint) {
		    		 $constraint->aspectRatio();
		    	});
		    	$img->save(public_path('images'). '/'. $image_name);
	    	}
	    	catch(Exception $e) {
	    		return back()->withErrors('Image upload failed.');;
	    	}
	    	$property->image_file_name =  $image_name;
	    	$property->image_content_type = $img->mime();
	    	$property->image_file_size = $img->filesize();
	    	$property->title = $request->input('title');
	    	$property->property_type = $request->input('property_type');
	    	$property->save();

	    	$address->line1 = $request->input('line1');
	    	$address->line2 = $request->input('line2');
	    	$address->line3 = $request->input('line3');
	    	$address->postcode = $request->input('postcode');
	    	$address->property_id = $property->id;
	    	$address->save();
        }	
	}
}
