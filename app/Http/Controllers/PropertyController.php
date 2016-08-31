<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Address;
use App\Models\Room;
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

	public function create_rooms($property_id){
		$user = Auth::user();
		$property = Property::findOrFail($property_id);
		return view('user.property.create_room',[
			'user'=>$user, 'property'=>$property,
		]);
	}

	public function publish($property_id){
		$user = Auth::user();
		$property = Property::findOrFail($property_id);
		return view('user.property.publish',[
			'user'=>$user, 'property'=>$property,
		]);
	}

	public function edit($property_id){
		$user = Auth::user();
		$property = Property::findOrFail($property_id);
		$address = $property->address;
		return view('user.property.edit',[
			'user'=>$user, 'property'=>$property, 'address'=>$address
		]);
	}

	public function edit_room($property_id, $room_id){
		$user = Auth::user();
		$room = Room::findOrFail($room_id);
		$property = Property::findOrFail($property_id);
		dd('in');
		return view('user.property.edit_rooms',[
			'user'=>$user, 'property'=>$property,'room'=>$room
		]);
	}

	public function update(Request $request, $property_id){
		$validator = Validator::make( $request->all(), [
            'title' => 'required|min:4',
            'line1' => 'required',
            'postcode' => 'required|min:5|alpha_num_spaces',
            'image' => 'mimes:jpeg,jpg,png,gif',
            'asking_value' => 'required',
        ]);
		$property = Property::findOrFail($property_id);
		if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
        } else {
			if(isset($request->all()['image']) ){ 
				try 
		    	{	
		    		$image =  $request->file('image');
		    		$image_name =  $image->getClientOriginalName();
		    		$imageRealPath =  $image->getRealPath();
		    		$extension =  $image->getClientOriginalExtension();

			    	$img = Image::make($imageRealPath); // use this if you want facade style code
			    	$img2 = Image::make($imageRealPath);
			    	$img->resize(intval(1170), null, function($constraint) {
			    		 $constraint->aspectRatio();
			    	});
			    	$img2->fit(intval(400), null, function($constraint) {
			    		 $constraint->aspectRatio();
			    	});
			    	$img->save(public_path('images'). '/'. $image_name);
			    	$img2->save(public_path('images'). '/'. 'thumb_'.$image_name);

			    	$property->image_file_name =  $image_name;
			    	$property->image_thumb_file_name = 'thumb_'.$image_name;
			    	$property->image_content_type = $img->mime();
		    	}
		    	catch(Exception $e) {
		    		return back()->withErrors('Image upload failed.');
		    	}
	    	}
	    	$address = $property->address;

	    	if($request->has('asking_value')) { $property->asking_value = $request->input('asking_value'); }
	    	if($request->has('title') )	{ $property->title = $request->input('title'); }
	    	if($request->has('display') ){ $property->display = 1; } else { $property->display = 0; }
	    	if($request->has('line1')) { $address->line_1 = $request->input('line1'); }
	    	if($request->has('line2')) { $address->line_2 = $request->input('line2'); }
	    	if($request->has('line3')) { $address->line_3 = $request->input('line3'); }
	    	if($request->has('postcode')) { $address->postcode = $request->input('postcode'); }
	    	if($request->has('display') ){ $property->display = 1;  } else { $property->display = 0; }

	    	$address->save();
	    	$property->save();
	    	return redirect(action('PropertyController@edit', [$property->id]));
	    }
	}

	public function store(Request $request, Property $property, Address $address){
        $validator = Validator::make( $request->all(), [
            'title' => 'required|min:4',
            'property_type' => 'required',
            'line1' => 'required',
            'postcode' => 'required|min:5|alpha_num_spaces',
            'image' => 'mimes:jpeg,jpg,png,gif',
            'property_type' =>'required|exists:property_type,id',
            'asking_value' => 'required',
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
		    	$img2 = Image::make($imageRealPath);
		    	$img->resize(intval(700), null, function($constraint) {
		    		 $constraint->aspectRatio();
		    	});
		    	$img2->fit(intval(350), null, function($constraint) {
		    		 $constraint->aspectRatio();
		    	});
		    	$img->save(public_path('images'). '/'. $image_name);
		    	$img2->save(public_path('images'). '/'. 'thumb_'.$image_name);
	    	}
	    	catch(Exception $e) {
	    		return back()->withErrors('Image upload failed.');
	    	}
	    	
	    	$property->image_file_name =  $image_name;
	    	$property->image_thumb_file_name =  $image_name.'_thumb';
	    	$property->image_content_type = $img->mime();

	    	$property->user_id = Auth::user()->id;
	    	$property->asking_value = $request->input('asking_value');
	    	$property->title = $request->input('title');
	    	$property->property_type_id = $request->input('property_type');
	    	if($request->has('display') ){ $property->display = 1; } else { $property->display = 0; }
	    	$property->save();

	    	$address->user_id = Auth::user()->id;
	    	$address->line_1 = $request->input('line1');
	    	$address->line_2 = $request->input('line2');
	    	$address->line_3 = $request->input('line3');
	    	$address->postcode = $request->input('postcode');
	    	$address->property_id = $property->id;
	    	$address->save();
	    	return redirect(action('PropertyController@create_rooms', [$property->id]));
        }	
	}

	public function published_update(Request $request, $property_id){
		$validator = Validator::make( $request->all(), [
            'title' => 'required|min:4|alpha_dash',
            'asking_value' =>'required'
        ]);
		$property = Property::findOrFail($property_id);
        if($request->has('asking_value')) { $property->asking_value = $request->input('asking_value'); }
	    if($request->has('title') )	{ $property->title = $request->input('title'); }
	    if($request->has('display') ){ $property->display = 1; } else { $property->display = 0; }
		$property->save();
		return redirect(action('PropertyController@edit', [$property->id]));//->with('info', 'Property details updated');
	}

	public function update_room(Request $request, $property_id, $room_id){
		$validator = Validator::make( $request->all(), [
            'title' => 'required|min:4',
            'image' => 'mimes:jpeg,jpg,png,gif',
        ]);
        
        if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
        } else {
        	if(isset($request->all()['image'])){
				try 
		    	{	
		    		$image =  $request->file('image');
		    		$image_name =  $image->getClientOriginalName();
		    		$imageRealPath =  $image->getRealPath();
		    		$extension =  $image->getClientOriginalExtension();
			    	$img = Image::make($imageRealPath); // use this if you want facade style code
			    	$img2 = Image::make($imageRealPath);
			    	$img->resize(intval(700), null, function($constraint) {
			    		 $constraint->aspectRatio();
			    	});
			    	$img2->fit(intval(350), null, function($constraint) {
			    		 $constraint->aspectRatio();
			    	});
			    	$img->save(public_path('images'). '/'. $image_name);
			    	$img2->save(public_path('images'). '/'. 'thumb_'.$image_name);
			    	$room->image_file_name =  $image_name;
			    	$room->image_content_type = $img->mime();
		    	}
		    	catch(Exception $e) {
		    		return back()->withErrors('Image upload failed.');
		    	}
		    }
		    //Name
		    $room->title =  $request->input('title');
        	$room->size_x = $request->input('size_x');
	    	$room->size_y = $request->input('size_y');
	    	$room->save();
	    	return redirect(action('PropertyController@edit', [$property->id]))->with('info', 'saved');
        }
	}

	public function store_rooms(Request $request, Room $room, $property_id){
		$validator = Validator::make( $request->all(), [
            'title' => 'required|min:4',
            'image' => 'mimes:jpeg,jpg,png,gif',
            'room_type_id' =>'required|exists:room_type,id'
        ]);
        
        if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
        } else {      	

        	if(isset($request->all()['image'])){
				try 
		    	{	
		    		$image =  $request->file('image');
		    		$image_name =  $image->getClientOriginalName();
		    		$imageRealPath =  $image->getRealPath();
		    		$extension =  $image->getClientOriginalExtension();
			    	$img = Image::make($imageRealPath); // use this if you want facade style code
			    	$img2 = Image::make($imageRealPath);
			    	$img->resize(intval(700), null, function($constraint) {
			    		 $constraint->aspectRatio();
			    	});
			    	$img2->fit(intval(350), null, function($constraint) {
			    		 $constraint->aspectRatio();
			    	});
			    	$img->save(public_path('images'). '/'. $image_name);
			    	$img2->save(public_path('images'). '/'.'thumb_'. $image_name);
			    	$room->image_file_name =  $image_name;
			    	$room->image_thumb_file_name = 'thumb_'.$image_name;
			    	$room->image_content_type = $img->mime();
		    	}
		    	catch(Exception $e) {
		    		return back()->withErrors('Image upload failed.');
		    	}
		    }
	    	$room->title =  $request->input('title');
	    	$room->size_x = $request->input('size_x');
	    	$room->size_y = $request->input('size_y');
	    	$room->description = $request->input('description');
	    	$room->room_type_id = $request->input('room_type_id');
	    	$room->property_id = $property_id;
	    	$room->save();
	    	return redirect(action('PropertyController@create_rooms', [$property_id]))->with('info', 'Room Saved');
	    }
	}

	public function delete_room($property_id, $room_id){
		$user = Auth::user();
		$room = Room::findOrFail($room_id);
		
		if($room->property->user_id == $user->id){
			$room->delete();
			return back()->with('info', 'Room Deleted');
		}
	}

	public function publish_store($property_id){
		$user = Auth::user();
		$property = Property::findOrFail($property_id);
		
		if($property->user_id == $user->id){
			$property->status = 'published';
			$property->save();
			return redirect(action('UserController@profile'))->with('info', 'Property published');
		}
	}
}
