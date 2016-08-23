@extends('common.layout')

@section('content')

<form action="{{ action('PropertyController@store_rooms', $property->id) }}" method="post" data-abide novalidate enctype="multipart/form-data">
	<div class="row">
		<div class="small-12">
			@if(count($property->rooms) > 0)
				<table>
					<thead><th>Description</th><th>Length</th><th>Width</th><th>Remove</th></thead>
					<tbody></tbody>	
				</table>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			<h4>Room Details</h4>
			{{ csrf_field() }}
			
			<div class="row">
				<div class="small-12 medium-12 columns">
					<label>Description<input type="text" name="description"  value="{{ old('description') }}" required></label>	
				</div>	
			</div>
			<div class="row">
				<div class="small-12 medium-6 columns">
					<label>Image 
						<button class="file-upload small-12">            
							<input style='border-style: solid;' type="file" class="file-input" name="image"   value="{{ old('image') }}">
						</button>
					</label>
				</div>
				<div class="small-12 medium-3 columns">
					<label>Width in foot<input type="text" name="size_x"  value="{{ old('size_x') }}" pattern='number'></label>
				</div>
				<div class="small-12 medium-3 columns">
					<label>Length in foot<input type="text" name="size_y"  value="{{ old('size_y') }}" pattern='number'></label>
				</div>
				
				<div class="small-12  columns" >
				<h4>Room Type</h4>
				<div class='row small-up-2 medium-up-7' >
					@foreach($property->property_type->validRoomTypes as $type)
						<div class="column" style="text-align:center;" >
							<label for="rtype_{{$type->id}}" class='property_type_lable'>	
								<input type="radio" value='{{$type->id}}' id="rtype_{{$type->id}}" name="room_type_id" required />
								<i class='{{$type->display_class}} float-center' ></i>
								{{$type->type_name}}
							</label>
						</div>
					@endforeach
				</div>
				<div class="small-12 medium-12 columns">
					<input style="margin-bottom:0px; margin-top:20px" type="submit" class="button float-center small-6" value="Add Room">
				</div>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection