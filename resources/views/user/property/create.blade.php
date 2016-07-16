@extends('common.layout')

@section('content')
	
	<form action="{{ action('PropertyController@store') }}" method="POST" data-abide novalidate>
		{{ csrf_field() }}
		<div class='row'>
			<div class="small-12 medium-6 columns">
				<label>
					<select>
						@foreach($property_type)

					</select>
				</label>
			</div>
			<div class="small-12 medium-6 columns">
				<label>Email address code was sent to<input type="email" name="email"></label>
			</div>
			<div class='small-12 columns'>
				<button class="file-upload">            
  					<input type="file" class="file-input">Choose File
  				</button>

			</div>
		</div>

	</form>
	
	
@endsection