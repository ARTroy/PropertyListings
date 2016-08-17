@extends('common.layout')

@section('content')
<div class="row">
		<div class="small-12 columns">
			<table>
				<thead><th>Description</th><th>size_x</th><th>size_y</th><th>Edit</th></thead>	
			</table>
		</div>
		<form action="{{ action('PropertyController@create_room') }}" method="post" data-abide novalidate enctype="multipart/form-data">
		<div class="small-12 columns">
			{{ csrf_field() }}
			<div class="small-12 medium-12 columns">
				<div class='row small-up-1 medium-up-3'>
					@foreach($room_type as $type)
						<div class="column" style="text-align:center;" >
							<label for="rtype_{{$type->id}}" class='room_type_lable'>	
								<input type="radio" value='{{$type->id}}' />
								<i class='{{$type->display_class}}' ></i>
								<p>{{$type->type_name}}</p>
							</label>
						</div>
					@endforeach
				</div>
				<div class="small-12 medium-6 columns">
					<label>Description<input type="text" name="description"  value="{{ old('description') }}"></label>	
				</div>	
				<div class="small-12 medium-6 columns">
					<label>Image 
						<button class="file-upload small-12">            
							<input style='border-style: solid;' type="file" class="file-input" name="image" required  value="{{ old('image') }}">
						</button>
					</label>
				</div>
				<div class="small-12 medium-6 columns">
					<label>Width in foot<input type="text" name="size_x"  value="{{ old('size_x') }}"></label>
				</div>
				<div class="small-12 medium-6 columns">
					<label>Length in foot<input type="text" name="size_y"  value="{{ old('size_y') }}"></label>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection