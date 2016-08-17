<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Address;
use Validator;
use Image;
use Auth;

class PropertyController extends Controller
{
	public function view($id){
		return view('public.property');
	}

	public function create(){
		$user = Auth::user();
		$properties = $user->properties->count();
		$invite_codes = $user->userInvites()->whereNotNull('claimed_at')->count();

		if($invite_codes *2 <= $properties){
			return back()->withErrors('Your account does not have any outstanding invitation codes.');
		}
		//'invite_code'=>$invite_code,
		$residential = PropertyType::where('use', '=', 'Residential')->get();
		$commercial = PropertyType::where('use', '=', 'Commercial')->get();
		return view('user.property.create', ['user'=>$user, 
			'residential'=>$residential, 'commercial'=>$commercial
		]);
	}

	public function edit($property_id){
		$user = Auth::user();
		$property = Property::findOrFail($property_id);
		return view('user.property.edit',[
			'user'=>$user, 'property'=>$property,
		]);
	}

	public function create_rooms($property_id){
		$user = Auth::user();
		$property = Property::findOrFail($property_id);

		return view('user.property.create_rooms',[
			'user'=>$user, 'property'=>$property,
		]);
	}

	public function update(Request $request, $property_id){
		$validator = Validator::make( $request->all(), [
            'title' => 'required|min:4|alpha_dash',
            'line1' => 'required',
            'postcode' => 'required|min:5|alpha_dash',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'asking_price' => 'required',
        ]);
		$property = Property::findOrFail($property_id);
		if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
        } else {
			if($request->has('image')){ 
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
			    	$property->image_file_name =  $image_name;
			    	$property->image_content_type = $img->mime();
			    	$property->image_file_size = $img->filesize();
		    	}
		    	catch(Exception $e) {
		    		return back()->withErrors('Image upload failed.');
		    	}
	    	}
	    }
	}

	public function store(Request $request, Property $property, Address $address){
        $validator = Validator::make( $request->all(), [
            'title' => 'required|min:4|alpha_dash',
            'property_type' => 'required',
            'line1' => 'required',
            'postcode' => 'required|min:5|alpha_dash',
            'image' => 'mimes:jpeg,jpg,png,gif',
            'property_type' =>'required|exists:property_type,id',
            'asking_price' => 'required',
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
	    		return back()->withErrors('Image upload failed.');
	    	}
	    	$property->user_id = Auth::user()->id;
	    	$property->image_file_name =  $image_name;
	    	$property->image_content_type = $img->mime();
	    	$property->image_file_size = $img->filesize();
	    	$property->asking_price = $request->input('title');
	    	$property->title = $request->input('asking_price');
	    	$property->property_type_id = $request->input('property_type');
	    	$property->save();

	    	$address->line_1 = $request->input('line1');
	    	$address->line_2 = $request->input('line2');
	    	$address->line_3 = $request->input('line3');
	    	$address->postcode = $request->input('postcode');
	    	$address->property_id = $property->id;
	    	$address->save();
	    	return redirect(action('PropertyController@create_rooms', [$property->id]));
        }	
	}
}
