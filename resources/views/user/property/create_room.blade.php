@extends('common.layout')

@section('content')
<div class="primary_container">
<div class="row">
	<div class="small-12 columns" style="margin-bottom:15px">
		<div class='row' style="margin-bottom:15px">
			<div class="medium-1 small-3 columns">
				<span class="badge badge_style">6</span>
			</div>
			<div class="medium-11 small-9 columns">
				<h4>Rooms</h4>
			</div>
		</div>
		@if(count($property->rooms) > 0)
		<p>Add as many rooms as your propert has.  Once it has at least one room, you can proceed to your profile, and publish the property.  Once published the property will only have its title, description and price ediable, so make sure everything is up to scratch.  <a href="{{action('PropertyController@edit', $property->id)}}" class="button" style="float:right; margin-top:4px;">Back to edit property</a></p>
		<div class="row">
			<div class="small-6 columns"></div>
			<div class="small-6 columns"></div>
		</div>
		<table>
			<thead>
				<th>Name</th><th>Type</th><th></th>
			</thead>
			<tbody>
				@foreach($property->rooms as $room)
					<tr>
						<td>{{ $room->title }}</td>
						<td>{{ $room->roomType->type_name }}</td>
						<td style="float: right;"><a href='{{action('PropertyController@delete_room', [$property->id, $room->id])}}'
						style="color:lightcoral;">Delete</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@endif

	</div>
	<form action="{{ action('PropertyController@store_rooms', $property->id) }}" method="post" data-abide novalidate enctype="multipart/form-data">
	<div class="small-12 columns">
		<h4>Add New Room</h4>
		{{ csrf_field() }}
		
		<div class="row">
			<div class="small-12 medium-6 columns">
				<label>Title<input type="text" name="title"  value="{{ old('title') }}" required></label>	
			</div>
			<div class="small-12 medium-6 columns">
				<label>Description<input type="text" name="description"  value="{{ old('description') }}" ></label>	
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
			<p>Room Type</p>
			<div class='row small-up-2 medium-up-8' >
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
				<input style="margin-bottom:0px; margin-top:20px" type="submit" class="button float-center small-6" value="Save">
			</div>
			</div>
		</div>
	</div>
	</form>
</div>
</div>
@endsection