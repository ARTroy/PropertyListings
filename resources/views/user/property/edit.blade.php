@extends('common.layout')

@section('content')

<div class="primary_container">
<div class="row">
	<div class="small-12 columns">
		@if($property->status == 'published')
			<h4>Main Details</h4>
			<p>As the property has been published, the following fields can be edited</p>
		</div>
		<form action="{{ action('PropertyController@published_update', $property->id) }}" method="post" data-abide novalidate>
			{{ csrf_field() }}
			<div class="small-12 medium-6 columns">
				<label>Title <input type="text" name="title" value="{{ $property->title }}" required></label>
			</div>
			<div class="small-12 medium-6 columns">
				<label>Asking price (£)
				<input type="text" name="asking_value" value="{{ (float)$property->asking_value }}" required pattern='number'></label>
			</div>
			<div class="small-12 medium-6 columns">
				<label><input type="checkbox" name="display" 
				@if($property->display == 1) checked @endif> Display location publicly</label>
			</div>
			<div class="small-12 medium-6 columns">
				<input type="submit" class="button small-12" 
				value="Save" name="" style="color:white" />
			</div>
		</form>
		@else
		<form action="{{ action('PropertyController@update', $property->id) }}" method="post" data-abide novalidate enctype="multipart/form-data">
		{{ csrf_field() }}
			<div class="small-12 medium-12 columns">
				<div class="row">
					<div class="small-12 columns">
						<h4>Main Details</h4>
					</div>
					<div class="small-12 medium-6 columns">
						<label>Title <input type="text" name="title" value="{{ $property->title }}" required></label>
						<label style="margin-top:15px">Asking price (£)
						<input type="text" name="asking_value" value="{{ (float)$property->asking_value }}" required pattern='number'></label>
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
							<img  style='max-width:120px; max-height:120px; float:right; margin-top: 23px;
							' src="/images/{{$property->image_file_name}}">
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
							<label>Parish / County<input type="text" name="locality" value="{{ $address->locality }}"></label>
						</div>
					<div class="small-12 medium-6 columns">
						<label>Postcode<input type="text" name="postcode" value="{{ $address->postcode }}" required></label>
					</div>
					<div class="small-12 medium-6 columns">
						<label>Country
							<select name="country">
							<option @if( $property->country) == 832) selected @endif value="832">Jersey</option>
							<option @if( $property->country) == 831) selected @endif value="831">Guernsey</option>
							<option @if( $property->country) == 826) selected @endif value="826">United Kingdom</option>
							</select>
						</label>
					</div>
					<div class="small-12 medium-6 columns">
								<label  style="margin-top: 24px;"><input type="checkbox" name="display" 
								@if($property->display == 1) checked @endif> Display location  publicly</label>
							</div>
					<div class="small-12 medium-6 columns">
								<input type="submit" class="button small-12" style=" margin-top:5px" 
								value="Save" name="" style="color:white" />
							</div>


					<div class="small-12 medium-12 columns">
						<h4>Further Options</h4>
					</div>
					<div class="small-12 medium-6 columns">
						<a style="color:white" class='button small-12' href="{{action('PropertyController@publish', $property->id)}}">Publish</a>
					</div>
					<div class="small-12 medium-6 columns">
						<a style="color:white" class='button small-12' href="{{action('PropertyController@create_rooms', $property->id)}}">Edit Rooms</a>
					</div>
				</div>
			</div>
		</form>
		@endif
	</div>

</div>
</div>
@endsection