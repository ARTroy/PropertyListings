@extends('common.layout')

@section('content')
<div class="row">
	<div class="small-12 columns">
		<form action="{{ action('PropertyController@update', $property->id) }}" method="post" data-abide novalidate enctype="multipart/form-data">
		{{ csrf_field() }}
			<div class="small-12 medium-12 columns">
				<div class="row">
					<div class="small-12 columns">
						<h4>Main Details</h4>
					</div>
					<div class="small-12 medium-6 columns">
						<label>Title <input type="text" name="title" value="{{ $property->title }}" required></label>
					</div>
					<div class="small-12 medium-6 columns">
						<div class="small-8 columns">
						<label>Image 
							<button class="file-upload">            
								<input type="file" class="file-input" name="image" style="padding:0px;">
							</button>
							
						</label>
						</div>
						<div class="small-4 columns">
							<img  style='max-width:120px; max-height:120px; float:right' src="/images/{{$property->image_file_name}}">
						</div>
					</div>


					<div class="small-12 columns">
						<h4>Address</h4>
					</div>
					<div class="small-12 medium-6 columns">
						<label>Line 1<input type="text" name="line1" value="{{ $address->line_1 }}" required></label>
					</div>
					<div class="small-12 medium-6 columns">
						<label>Line 2<input type="text" name="line2" value="{{ $address->line_2 }}" ></label>
					</div>
					<div class="small-12 medium-6 columns">
						<label>Line 3<input type="text" name="line3" value="{{ $address->line_3 }}"></label>
					</div>
					<div class="small-12 medium-6 columns">
						<label>Postcode<input type="text" name="postcode" value="{{ $address->postcode }}" required></label>
					</div>
					<div class="small-12 medium-6 columns">
						<label >Asking price (£)
						<input type="text" name="asking_value" value="{{ (float)$property->asking_value }}" required pattern='number'></label>
					</div>
					<div class="small-12 medium-6 columns" style="margin-top:25px;">
						<div class="row">
							<div class="small-12 medium-6 columns">
								<label><input type="checkbox" name="display" 
								@if($property->display == 1) checked @endif> Display publicly</label>
							</div>
							<div class="small-12 medium-6 columns">
								<input type="submit" class="button small-12" 
								value="Save" name="" style="color:white" />
							</div>
						</div>
					</div>
					
					<div class="small-12 columns">
						<h4>Rooms</h4>
					</div>
					<div class="small-12 medium-8 columns">
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
					</div>
					<div class="small-12 medium-4 columns">
						<a style="color:white" class='button small-12' href="{{action('PropertyController@create_rooms', $property->id)}}">Add Room</a>
					</div>
				</div>
			</div>
		</form>
	</div>

</div>
@endsection