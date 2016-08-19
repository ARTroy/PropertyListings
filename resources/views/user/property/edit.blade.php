@extends('common.layout')

@section('content')
<div class="row">
	<div class="small-12 columns panel">
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
								<input type="file" class="file-input" name="image" required style="padding:0px;">
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
					<div class="small-12 medium-12 columns" style="margin-bottom:10px;">
						<label><input type="checkbox" name="display" value="{{ $address->display }}" 
						@if($property->display) checked @endif> Display publicly</label>
					</div>

					<div class="small-12 medium-12 columns">
						<div class='row'>
						<div class="small-6 medium-6 columns">
							<input type="submit" class="button small-12" 
							value="Save" name="" style="color:white" />
						</div>
						<div class="small-6 medium-6 columns">
							<a style="color:white" class='button small-12' href="{{action('PropertyController@create_rooms', $property->id)}}">Rooms</a>
						</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

</div>
@endsection